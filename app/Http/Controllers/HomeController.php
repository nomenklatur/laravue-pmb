<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Flow;
use App\PageActive;
use App\Prodi;
use App\Study;
use App\Tuitionfee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front');
    }

    public function flow(){
        $flow = Flow::all();
        return view('alur', ['flow'=> $flow]);
    }

    public function announcement(){
        $announces = Announcement::orderBy('updated_at', 'DESC')->get();
        return view('pengumuman', ['announces'=>$announces]);
    }

    public function fee(){
        $fee = Tuitionfee::orderBy('updated_at', 'DESC')->get();
        return view('uang', ['fees'=>$fee]);
    }

    public function register(){
        $page = PageActive::all();
        $prodi_s1 = Prodi::where('level' , 's1')->get();
        $prodi_s2 = Prodi::where('level' , '<>', 's1')->get();
        return view('daftar', ['page'=>$page, 'prodi_s1' => $prodi_s1, 'prodi_s2'=>$prodi_s2]);
    }

    public function studi(){
        $study = Study::all();
        return view('studi', ['study'=>$study]);
    }

    public function visi(){
        return view('visi');
    }

    public function history(){
        return view('history');
    }

    public function login(){
        return view('login');
    }
}
