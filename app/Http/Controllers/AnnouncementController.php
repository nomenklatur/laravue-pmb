<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //

    public function show(){
        return Announcement::orderBy('updated_at', 'desc')->paginate(5);
    }

    public function store(){
        request()->validate([
            'title' =>  'required',
            'desc' =>  'required',
        ]);

        $announcements = Announcement::create([
            'title' => request('title'),
            'description' => request('desc'),
        ]);

        return response()->json([
            "msg"  => "success",
            "data" => $announcements
        ], 200);
    }

    public function update(){
        request()->validate([
            'id'    =>  'required',
            'title' =>  'required',
            'desc'  =>  'required',
        ]);

        $announcements = Announcement::where('id', request('id'))->update([
            'title'       => request('title'),
            'description' => request('desc')
        ]);

        return response()->json([
            'msq' => 'success',
            'data' => $announcements
        ], 200);
    }

    public function delete(){
        request()->validate([
            'id'=>'required'
        ]);

        return Announcement::where('id', request('id'))->delete();
    }
}
