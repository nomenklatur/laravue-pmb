<?php

namespace App\Http\Controllers;

use App\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    //

    public function show(){
        return response()->json([
            'count' => Study::count(),
            'data' => Study::first()
        ]);
    }

    public function store(){
        request()->validate([
            'study' =>  'required',
        ]);

        Study::create([
            'study' => request('study'),
        ]);

        return response()->json([
            "msg"  => "success",
            "data" => Study::first()
        ], 200);
    }

    public function update(){
        request()->validate([
            'study' =>  'required',
        ]);

        $study = Study::where('id', request('id'))->update([
            'id'          => request('id'),
            'study'       => request('study'),
        ]);

        return response()->json([
            'msq' => 'success',
            'data' => $study
        ], 200);
    }
}
