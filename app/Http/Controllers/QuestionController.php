<?php

namespace App\Http\Controllers;

use App\Question;
use App\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function show(){
        return Question::with('subject')->orderBy('updated_at', 'desc')->paginate(request('total'));
    }

    public function question(){
        return Question::all();
    }

    public function subjects(){
        return Subject::get();
    }

    public function store(){
        request()->validate([
            'subject_id'=> 'required',
            'question'=> 'required',
            'pil_a'=> 'required',
            'pil_b'=> 'required',
            'pil_c'=> 'required',
            'pil_d'=> 'required',
            'pil_e'=> 'required',
            'key_answer'=> 'required',
        ]);
        

        $question = Question::create([
            'subject_id'=> request('subject_id'),
            'question'=> request('question'),
            'pil_a'=> request('pil_a'),
            'pil_b'=> request('pil_b'),
            'pil_c'=> request('pil_c'),
            'pil_d'=> request('pil_d'),
            'pil_e'=> request('pil_e'),
            'key_answer'=> request('key_answer'),
        ]);
        

        return response()->json([
            'msg' => 'success',
            'data' => Question::with('subject')->get()
        ], 200);

    }

    public function update(){
        request()->validate([
            'id' => 'required',
            'subject_id'=> 'required',
            'question'=> 'required',
            'pil_a'=> 'required',
            'pil_b'=> 'required',
            'pil_c'=> 'required',
            'pil_d'=> 'required',
            'pil_e'=> 'required',
            'key_answer'=> 'required',
        ]);

        $question = Question::where('id', request('id'))->update([
            'subject_id'=> request('subject_id'),
            'question'=> request('question'),
            'pil_a'=> request('pil_a'),
            'pil_b'=> request('pil_b'),
            'pil_c'=> request('pil_c'),
            'pil_d'=> request('pil_d'),
            'pil_e'=> request('pil_e'),
            'key_answer'=> request('key_answer'),
        ]);

        return response()->json([
            'msg' => 'success',
            'data' => Question::with('subject')->get()
        ], 200);
    }

    public function delete(){
        request()->validate([
            'id'=>'required'
        ]);

        return Question::where('id', request('id'))->delete();
    }
}
