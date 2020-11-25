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
}
