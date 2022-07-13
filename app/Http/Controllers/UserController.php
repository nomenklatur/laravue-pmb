<?php

namespace App\Http\Controllers;

use App\File;
use App\UploadFileKip;
use App\Prodi;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function index(Request $request){
        // return Auth::check();
        if(!Auth::check() && $request->path()!= 'auth'){
            return redirect('auth');
        }

        if(!Auth::check() && $request->path() == 'auth'){
            return view('admin');
        }
        $user = Auth::user();
        if($request->path()=='auth'){
            return redirect('admin/dashboard');
        }
        return view('admin');
    }

    public function show(){
        return User::where(['role'=>'admin'])->orderBy('updated_at', 'desc')->paginate(request('total'));
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $store = User::create([
            'name'      => request('name'),
            'username'  => request('username'),
            'role'      => 'admin',
            'degress'   => request('degress'),
            'year'     => date('Y'),
            'password'  => Hash::make(request('password'))
        ]);
        
        return response()->json([
            'msg' => 'success',
            'data' => $store
        ], 200);
    }

    public function update(){
        request()->validate([
            'name' => 'required',
            'id'   => 'required',
            'username' => 'required' 
        ]);
        
        return User::where('id', request('id'))->update([
            'name' => request('name'),
            'username' => request('username')
        ], 200);

    }

    public function updatePassword(){
        request()->validate([
            'id'   => 'required',
            'password' => 'required',
        ]);
        
        return User::where('id', request('id'))->update([
            'password' => Hash::make(request('password')) 
        ], 200);

    }

    public function delete(){
        request()->validate([
            'id' => 'required'
        ]);

        return User::where('id', request('id'))->delete();
    }

    public function logout(){
        Auth::logout();
        return redirect('/auth');
    }

    public function participant(){
        return User::where('role', 'user')->with('results')->orderBy('updated_at', 'desc')->paginate(request('total'));
    }

    public function participants(){
        $users = User::where(['role'=> 'user','activated'=> '0', 'degress'=> 'sarjana'])->with('upload')->orderBy('updated_at', 'desc')->when(request()->name, function($users, $ads){
            $users = $users->where('name', 'LIKE', '%' . request()->name. '%');
        })->paginate(request('total'));

        return $users;
    }

    public function active_participants(){
        return User::where(['role'=> 'user','activated'=> '1', 'degress'=> 'sarjana'])->with(['upload', 'prodi', 'prodi1', 'schedule','biodata'])->orderBy('updated_at', 'desc')->when(request()->name, function($users, $ads){
            $users = $users->where('name', 'LIKE', '%' . request()->name. '%');
        })->paginate(request('total'));
    }
    

    public function participants_s2(){
        return User::where(['role'=> 'user','activated'=> '0', 'degress'=> 'pascasarjana'])->with(['file', 'upload'])->orderBy('updated_at', 'desc')->paginate(request('total'));
    }

    public function activeparticipants_s2(){
        return User::where(['role'=> 'user','activated'=> '1', 'degress'=> 'pascasarjana'])->with(['file', 'upload', 'prodi'])->orderBy('updated_at', 'desc')->paginate(request('total'));
    }


    public function pendingparticipants_s2(){
        return User::where(['role'=> 'user','activated'=> '0', 'degress'=> 'pascasarjana'])->with(['file', 'upload'])->orderBy('updated_at', 'desc')->paginate(request('total'));
    }

    public function active_participants_s2(){
        request()->validate([
            'activated' => 'required',
            'id_select_user'   => 'required',
        ]);

        $number =  strval(request('nomor'). '.' .'0'. request('prodi') . '.pmb.2021');
        User::where('id', request('id_select_user'))->update([
            'activated' => request('activated'),
            'test_number' =>$number,
        ]);

        File::where('id', request('id_file'))->update([
            'noted' => request('catatan'),
            'status' => request('status')
        ]);



        return response()->json([
            'msg' => 'Berhasil diupdate',
        ]);
    }

    public function update_activate(){
        request()->validate([
            'activated' => 'required',
            'id_select_user'   => 'required',
        ]);
        
         User::where('id', request('id_select_user'))->update([
            'activated' => request('activated'),
        ]);
            
        return response()->json([
            'msg' => 'Berhasil diupdate',
        ]);

    }

    public function update_schedule(){
        request()->validate([
            'jadwalId' => 'required',
            'id_select_user'   => 'required',
        ]);
        
         User::where('id', request('id_select_user'))->update([
            'schedule_id' => request('jadwalId'),
        ]);
            
        return response()->json([
            'msg' => 'Berhasil diupdate',
        ]);

    }


    public function prodi(){
        $prodi = Prodi::orderBy('updated_at', 'desc')->paginate(request('total'));

        return response()->json([
            'msg' => 'Success get data',
            'data'=> $prodi
        ], 200);
    }


    public function add_prodi(){
        request()->validate([
            'name' => 'required',
            'level' => 'required',
            'code'  => 'required'
        ]);

        $store = Prodi::create([
            'names' => request('name'),
            'level' => request('level'),
            'code'  => request('code')
        ]);

        return response()->json([
            'msg' => 'Success add data',
            'data'=> $store
        ]);
    }


    public function update_prodi(){
        request()->validate([
            'name'  => 'required',
            'id'    => 'required',
            'level' => 'required',
            'code'  => 'required'
        ]);
        
        return Prodi::where('id', request('id'))->update([
            'names' => request('name'),
            'level' => request('level'),
            'code'  => request('code')
        ], 200);

    }

    public function delete_prodi(){
        request()->validate([
            'id' => 'required'
        ]);

        return Prodi::where('id', request('id'))->delete();
    }

    public function getYear(){

        $tahun = User::select('year')->distinct()->get()->groupBy('year');

        return response()->json([
            'msg'   => 'success',
            'tahun' => $tahun
        ]);
    }

    public function getProdi(){
        $prodi = Prodi::where('level', '<>', 's1')->paginate(request('total'));

        return response()->json([
            'msg' => 'success',
            'prodi'=> $prodi
        ]);
    }

    public function getProdi_s1(){
        $prodi = Prodi::where('level', 's1')->paginate(request('total'));

        return response()->json([
            'msg' => 'success',
            'prodi'=> $prodi
        ]);
    }

    public function print($id){
        $user = User::with(['prodi', 'file'])->find($id);
        // dd($user->toArray());
        $pdf = PDF::loadview('cetak',['user'=>$user]);
    	return $pdf->stream();
    }


    public function updateProdi_s1(){
        request()->validate([
            'prodi' => 'required',
            'user_id'   => 'required',
        ]);

        User::where('id', request('user_id'))->update([
            'prodi_1' => request('prodi'),
        ]);
            
        return response()->json([
            'msg' => 'Berhasil diupdate',
        ]);

    }
    public function userDetail($user_id){
        $user =  User::where('id', $user_id)->first();
        $prodi1 = Prodi::where('id',$user['prodi'])->first();
        $prodi2 = Prodi::where('id',$user['prodi_1'])->first();
        
        return response()->json([
            'msg' => 'Berhasil diupdate',
            'user'=>$user,
            'prodi1'=>$prodi1,
            'prodi2'=>$prodi2
        ]);
    }
}
