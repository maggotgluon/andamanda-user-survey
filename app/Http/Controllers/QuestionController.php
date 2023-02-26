<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function all(){
        return Question::all();
    }
    public function create(Request $request){
        // dd($request);
        $q = new Question();
        $q->Question = $request->question;
        $q->status = $request->status?1:0;

        return $q->save();
    }
}
