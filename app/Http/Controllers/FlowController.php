<?php

namespace App\Http\Controllers;

use App\Flow;
use Illuminate\Http\Request;

class FlowController extends Controller
{
    //
    public function show(){
        return response()->json([
            'count' => Flow::count(),
            'data' => Flow::first()
        ]);
    }

    public function store(){
        request()->validate([
            'flows' =>  'required',
        ]);

        $flow = Flow::create([
            'flows' => request('flows'),
        ]);

        return response()->json([
            "msg"  => "success",
            "data" => Flow::first()
        ], 200);
    }

    public function update(){
        request()->validate([
            'flows' =>  'required',
        ]);

        $flow = Flow::where('id', request('id'))->update([
            'id'          => request('id'),
            'flows'       => request('flows'),
        ]);

        return response()->json([
            'msq' => 'success',
            'data' => $flow
        ], 200);
    }
}
