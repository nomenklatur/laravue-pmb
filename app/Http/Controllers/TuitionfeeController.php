<?php

namespace App\Http\Controllers;

use App\Tuitionfee;
use Illuminate\Http\Request;

class TuitionfeeController extends Controller
{
    //

    public function show(){
        return response()->json([
            'count' => Tuitionfee::count(),
            'data' => Tuitionfee::first()
        ]);
    }

    public function store(){
        request()->validate([
            'fee' =>  'required',
        ]);

        Tuitionfee::create([
            'fee' => request('fee'),
        ]);

        return response()->json([
            "msg"  => "success",
            "data" => Tuitionfee::first()
        ], 200);
    }

    public function update(){
        request()->validate([
            'fee' =>  'required',
        ]);

        $fee = Tuitionfee::where('id', request('id'))->update([
            'id'          => request('id'),
            'fee'       => request('fee'),
        ]);

        return response()->json([
            'msq' => 'success',
            'data' => $fee
        ], 200);
    }
}
