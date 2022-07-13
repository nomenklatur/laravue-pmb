<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;

class UploadFileKipController extends Controller
{
    public function store(Request $request)
    {
        request()->validate([
            'user_id'   => 'required',
            'fileKK' => 'required',
            'fileKIP' => 'required',
            'fileIjazah' => 'required'
        ]);
        $cek_user = Biodata::where('user_id', $request->get('user_id'))->count();
        $file_user = Biodata::where('user_id', $request->get('user_id'))->get();
        if($cek_user>0){

            if($request->hasFile('fileKK'))
            {   
                if(file_exists(public_path('upload_kip/'.$file_user[0]->file_kk)!==null)){
                    unlink(public_path('upload_kip/'.$file_user[0]->file_kk));
                }
                $fileKK = $request->file('fileKK');
                $name_KK  = 'kk-' . strtolower($fileKK->getClientOriginalName());
                $fileKK->move('public/upload_kip/',strtolower('kk-' .$fileKK->getClientOriginalName()));
            }
            if($request->hasFile('fileIjazah'))
            {
                if(file_exists(public_path('upload_kip/'.$file_user[0]->file_kip)!==null)){
                    unlink(public_path('upload_kip/'.$file_user[0]->file_kip));
                }
                $fileIjazah = $request->file('fileIjazah');
                $name_Ijazah  = 'ijazah-' . strtolower($fileIjazah->getClientOriginalName());
                $fileIjazah->move('public/upload_kip/',strtolower('ijazah-' . $fileIjazah->getClientOriginalName()));
            }
            
            if($request->hasFile('fileKIP'))
            {
                if(file_exists(public_path('upload_kip/'.$file_user[0]->file_kip)!==null)){
                    unlink(public_path('public/upload_kip/'.$file_user[0]->file_kip));
                }
                $fileKIP = $request->file('fileKIP');
                $name_KIP  = 'kip-' . strtolower($fileKIP->getClientOriginalName());
                $fileKIP->move('public/upload_kip/',strtolower('kip-' . $fileKIP->getClientOriginalName()));
            }


            $file = Biodata::where('user_id', $request->get('user_id'))->update([
                'file_kk' => $name_KK,
                'file_kip'=> $name_KIP,
                'file_ijazah'=> $name_Ijazah,
           ]);

           $data=[
               "user_id"=>$request->get('user_id'),
               "file_kk"=>$name_KK,
               "file_kip"=>$name_KIP,
               "file_ijazah"=>$name_Ijazah
           ];
           return response()->json([
            'msg' => 'success',
            'data' => $data
        ], 200);

        }else{            
           return response()->json([
            'msg' => 'failed',
            'data' => 'Please Insert Biodata'
        ], 200);

        }
    }
    public function show($user_id)
    {
        return response()->json(['msg'=> 'data berhasil diambil', 'data'=>Biodata::where('user_id',$user_id)->first()]);
    }

}
