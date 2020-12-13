<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function __invoke(Request $request)
    {
        //
    }
    
    public function register(Request $request) {
        $validator = Validator::make($request->input(), [
            'name' => 'required',
            'institution' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect('/registration')
            ->withErrors($validator)
            ->withInput();
        }
        
        // $code = substr(bcrypt(json_encode($request->input())), 3, 5);
        $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 6);
        
        DB::table('users')->insert(
            [
                'name' => ucwords($request->name),
                'institution' => $request->institution,
                'nim' => $request->nim,
                'semester' => $request->semester,
                'code' => $code
            ]
        );
        
        return redirect('/quisionaire?code='.$code);
    }

    public function getUsers(Request $request)
    {
        $users = DB::table('users')
        ->select('users.*',DB::raw('count(questionaires.id) as progress'))
        ->leftJoin('questionaires','users.id','=','questionaires.user_id')
        ->groupBy('users.id')
        ->get();

        $wordCount = DB::table('words')->count();

        return view('pages.user-list', compact('users','wordCount'));
    }

    public function deleteUser(Request $request)
    {
        DB::table('questionaires')->where('user_id','=',$request->id)->delete();
        DB::table('users')->where('id','=',$request->id)->delete();

        return;
    }
}
