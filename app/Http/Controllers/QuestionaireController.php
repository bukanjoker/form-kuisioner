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
}
