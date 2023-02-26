<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //

    public function create(Request $request){
        dd($request);
        $a = new Answer();
        $a->Question = $request->rate;
        $a->status = $request->status?1:0;

        return $q->save();
    }
}
