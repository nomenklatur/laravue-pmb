<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function show(){
        return Schedule::orderBy('updated_at', 'desc')->paginate(request('total')) ;
    }

    public function store(){
        request()->validate([
            'agenda' => 'required',
            'date'   => 'required',
            'start_time'   => 'required',
            'end_time'   => 'required',
            'status'   => 'required',
        ]);

        $schedule = Schedule::create([
            'agenda' => request('agenda'),
            'date'   => request('date'),
            'start_time'   => request('start_time'),
            'end_time'   => request('end_time'),
            'status' => request('status'),
        ]);
        return response()->json([
            'msg' => 'succes',
            'data' => $schedule
        ], 200);
    }

    public function getDate(){
        return Schedule::where('status', '1')->orderBy('date')->orderBy('start_time')->get();
    }

    public function getDate_($id){
        return User::where('id', $id)->with('schedule')->get();
    }

    public function update(){
            request()->validate([
                'id'    => 'required',
                'agenda' => 'required',
                'date'   => 'required',
                'start_time'   => 'required',
                'end_time'   => 'required',
                'status'   => 'required',
            ]);

            $update = Schedule::where('id', request('id'))->update([
                'agenda' => request('agenda'),
                'date'   => request('date'),
                'start_time'   => request('start_time'),
                'end_time'   => request('end_time'),
                'status' => request('status'),
            ]);
            $schedule = Schedule::get();
            return response()->json([
                'msg' => 'success',
                'data' => $schedule
            ], 200);
    }

    public function delete(){
        request()->validate([
            'id' => 'required'
        ]);
        
        return Schedule::where('id', request('id'))->delete();
    }
 
}
