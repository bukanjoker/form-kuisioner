<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class QuestionaireController extends Controller
{
    public function addWords(Request $request) {
        $validator = Validator::make($request->input(), [
            'word_1' => 'required',
            'word_2' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect('/form-data')
            ->withErrors($validator)
            ->withInput();
        }
        
        $date = date('Y-m-d H:i:s');
        
        DB::table('words')->insert(
            [
                'word_1' => $request->word_1,
                'word_2' => $request->word_2,
                'type' => $request->type,
                'created_at' => $date,
                'updated_at' => $date
            ]
        );
        
        return redirect('/form-data');
    }
    
    public function getFormData(Request $request) {
        $param = 1;
        
        if ($request->search) {
            $param = "word_1 LIKE '%".$request->search."%' OR word_2 LIKE '%".$request->search."%'";
        }
        
        $words = DB::table('words')
            ->select(
                'words.*',
                DB::raw('(CASE WHEN SUM(questionaires.score_similarity) IS NULL THEN 0 ELSE SUM(questionaires.score_similarity) END) as score_similarity,
                (CASE WHEN SUM(questionaires.score_relatedness) IS NULL THEN 0 ELSE SUM(questionaires.score_relatedness) END) as score_relatedness'),
            )
            ->leftJoin('questionaires', 'questionaires.word_id', '=', 'words.id')
            ->whereRaw($param)
            ->groupBy('words.id')
            ->orderBy('words.created_at', 'desc')
            ->get();
            
        // $koresponden = DB::raw('select count(*) as count from (select user_id from questionaires group by user_id) koresponden')->get();
        $koresponden = count(DB::table('questionaires')->select('user_id')->groupBy('user_id')->get());
            
        $wordCount = DB::table('words')->count();
        
        return view('pages.form-data',compact('words','koresponden', 'wordCount'));
    }
    
    public function deleteWord(Request $request) {
        DB::table('words')->where('id','=',$request->id)->delete();
        
        return redirect('/form-data');
    }
    
    public function getQuestionaries(Request $request) {
        $user = DB::table('users')->where('code','=',$request->code)->first();
        
        if (!$user) {
            return redirect('/');
        }

        $words = DB::table('words')
        ->leftJoin(DB::raw('(SELECT id as q_id, word_id, score_similarity, score_relatedness FROM questionaires WHERE user_id = '.$user->id.') p'),"p.word_id","=","id")
        ->paginate(50);

        $progress = DB::table('questionaires')->where('user_id',$user->id)->count();

        return view('pages.quisioner',compact('words','user','request','progress'));
    }

    public function insertQuestionaries(Request $request)
    {
        $user = DB::table('users')->where('code','=',$request->code)->first();
        $data = DB::table('questionaires')->whereRaw("user_id = ".$user->id." AND word_id = ".$request->word_id)->get();

        if (count($data) == 0) {
            DB::table('questionaires')->insert(
                [
                    'user_id' => $user->id,
                    'word_id' => $request->word_id,
                    'score_similarity' => $request->score_similarity,
                    'score_relatedness' => $request->score_relatedness
                ]
            );
        }

        return;
    }

    public function updateQuestionaries(Request $request)
    {
        DB::table('questionaires')->where('id',$request->id)
        ->update([
            'score_similarity' => $request->score_similarity,
            'score_relatedness' => $request->score_relatedness
        ]);

        return;
    }

    public function getDataTable(Request $request)
    {
        $data = DB::select('
            SELECT 
                dt.word_id, 
                dt.word_1, 
                dt.word_2,
                dt.mean_similarity,
                dt.total_similarity,
                (dt.total_similarity/4*10) as GS,
                dt.mean_relatedness,
                dt.total_relatedness,
                (dt.total_relatedness/4*10) as GR
            FROM
            (
                SELECT 
                    q.word_id, 
                    w.word_1, 
                    w.word_2,
                    AVG(q.score_similarity) as mean_similarity,
                    SUM(q.score_similarity) as total_similarity,
                    AVG(q.score_relatedness) as mean_relatedness,
                    SUM(q.score_relatedness) as total_relatedness
                FROM questionaires q
                LEFT JOIN words w ON q.word_id = w.id
                LEFT JOIN users u ON q.user_id = u.id
                WHERE q.user_id IN (
                    SELECT q.user_id
                    FROM questionaires q
                    GROUP BY q.user_id
                    HAVING COUNT(*) = 500
                )
                GROUP BY
                    q.word_id
            ) as dt
        ');

        $userComplete = DB::select('
            SELECT q.user_id
            FROM questionaires q
            GROUP BY q.user_id
            HAVING COUNT(*) = 500
        ');
        $userAssigned = DB::select('
            SELECT q.user_id
            FROM questionaires q
            GROUP BY q.user_id
            HAVING COUNT(*) > 1
        ');

        return view('pages.data-table', ['data'=>$data, 'userComplete'=>count($userComplete), 'userAssigned'=>count($userAssigned)]);
    }
}
