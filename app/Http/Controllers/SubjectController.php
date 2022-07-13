<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function show(){
        return Subject::orderBy('updated_at', 'desc')->paginate(request('total'));
    }

    public function store(){
        request()->validate([
            'mapel' => 'required'
        ]);

        $store = Subject::create([
            'name' => request('mapel')
        ]);
        
        return response()->json([
            'msg' => 'success',
            'data' => $store
        ], 200);
    }

    public function update(){
        request()->validate([
            'name' => 'required',
            'id'   => 'required'
        ]);
        
        return Subject::where('id', request('id'))->update([
            'name' => request('name')
        ], 200);

    }

    public function delete(){
        request()->validate([
            'id' => 'required'
        ]);

        return Subject::where('id', request('id'))->delete();
    }
}
