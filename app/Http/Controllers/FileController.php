<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    public function store(Request $request){
        request()->validate([
            'user_id'   => 'required',
            'foto' => 'required',
            'rekom' => 'required',
            'cv' => 'required',
            'ktp' => 'required',
            'ijazah' => 'required',
            'transkrip' => 'required',
            'karyailmiah' => 'required',
        ]);

        $cek_user = File::where('user_id', $request->get('user_id'))->count();
        $file_user = File::where('user_id', $request->get('user_id'))->get();
        // return response()->json([
        //     'data' => $file_user
        // ]);
        if($cek_user>0){
            if($request->hasFile('rekom'))
            {   
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_rekom))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_rekom));
                }
                $rekom = $request->file('rekom');
                $name_rekom  = 'rekom-' . strtolower($rekom->getClientOriginalName());
                $rekom->move('public/upload_file',strtolower('rekom-' .$rekom->getClientOriginalName()));
            }

            if($request->hasFile('transkrip'))
            {   
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_transkrip))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_transkrip));
                }
                $transkrip = $request->file('transkrip');
                $name_transkrip  = 'transkrip-' . strtolower($transkrip->getClientOriginalName());
                $transkrip->move('public/upload_file',strtolower('transkrip-' .$transkrip->getClientOriginalName()));
            }

            if($request->hasFile('ijazah'))
            {   
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_ijazah))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_ijazah));
                }
                $ijazah = $request->file('ijazah');
                $name_ijazah  = 'ijazah-' . strtolower($ijazah->getClientOriginalName());
                $ijazah->move('public/upload_file',strtolower('ijazah-' .$ijazah->getClientOriginalName()));
            }

            if($request->hasFile('karyailmiah'))
            {   
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_karyailmiah))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_karyailmiah));
                }
                $karyailmiah = $request->file('karyailmiah');
                $name_karyailmiah  = 'karyailmiah-' . strtolower($karyailmiah->getClientOriginalName());
                $karyailmiah->move('public/upload_file',strtolower('karyailmiah-' .$karyailmiah->getClientOriginalName()));
            }

            // if($request->hasFile('kartu'))
            // {
            //     if(file_exists(public_path('upload_file/'.$file_user[0]->file_kartu))){
            //         unlink(public_path('upload_file/'.$file_user[0]->file_kartu));
            //     }
            //     $kartu = $request->file('kartu');
            //     $name_kartu  = 'kartu-' . strtolower($kartu->getClientOriginalName());
            //     $kartu->move('upload_file',strtolower('kartu-' . $kartu->getClientOriginalName()));
            // }

            if($request->hasFile('cv'))
            {
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_cv))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_cv));
                }
                $cv = $request->file('cv');
                $name_cv  = 'cv-' . strtolower($cv->getClientOriginalName());
                $cv->move('public/upload_file',strtolower('cv-' . $cv->getClientOriginalName()));
            }
            
            if($request->hasFile('foto'))
            {
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_foto))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_foto));
                }
                $foto = $request->file('foto');
                $name_foto  = 'foto-' . strtolower($foto->getClientOriginalName());
                $foto->move('public/upload_file',strtolower('foto-' . $foto->getClientOriginalName()));
            }

            if($request->hasFile('ktp'))
            {
                if(file_exists(public_path('public/upload_file/'.$file_user[0]->file_ktp))){
                    unlink(public_path('public/upload_file/'.$file_user[0]->file_ktp));
                }
                $ktp = $request->file('ktp');
                $name_ktp  = 'ktp-' . strtolower($ktp->getClientOriginalName());
                $ktp->move('public/upload_file',strtolower('ktp-' . $ktp->getClientOriginalName()));
            }



           $file = File::where('user_id', $request->get('user_id'))->update([
                'file_rekom' => $name_rekom,
                'file_cv'    => $name_cv,
                'file_foto'    => $name_foto,
                'file_ktp'    => $name_ktp,
                'file_ijazah' => $name_ijazah,
                'file_transkrip' => $name_transkrip,
                'file_karyailmiah' => $name_karyailmiah,
                'status'     => 'pending'
           ]);
           return response()->json([
            'msg' => 'success',
            'data' => $file
        ], 200);
        }else{
            {
                $rekom = $request->file('rekom');
                $name_rekom  = 'rekom-' . $rekom->getClientOriginalName();
                $rekom->move('public/upload_file','rekom-' . $rekom->getClientOriginalName());
            }

            // if($request->hasFile('kartu'))
            // {
            //     $kartu = $request->file('kartu');
            //     $name_kartu  = 'kartu-' . $kartu->getClientOriginalName();
            //     $kartu->move('upload_file','kartu-' . $kartu->getClientOriginalName());
            // }

            if($request->hasFile('cv'))
            {
                $cv = $request->file('cv');
                $name_cv  = 'cv-' . $cv->getClientOriginalName();
                $cv->move('public/upload_file', 'cv-' . $cv->getClientOriginalName());
            }


            if($request->hasFile('foto'))
            {
                $foto = $request->file('foto');
                $name_foto  = 'foto-' . strtolower($foto->getClientOriginalName());
                $foto->move('public/upload_file',strtolower('foto-' . $foto->getClientOriginalName()));
            }

            if($request->hasFile('ktp'))
            {
                $ktp = $request->file('ktp');
                $name_ktp  = 'ktp-' . strtolower($ktp->getClientOriginalName());
                $ktp->move('public/upload_file',strtolower('ktp-' . $ktp->getClientOriginalName()));
            }

            if($request->hasFile('transkrip'))
            {
                $transkrip = $request->file('transkrip');
                $name_transkrip = 'transkrip-' . strtolower($transkrip->getClientOriginalName());
                $transkrip->move('public/upload_file',strtolower('transkrip-' . $transkrip->getClientOriginalName()));
            }

            if($request->hasFile('ijazah'))
            {
                $ijazah = $request->file('ijazah');
                $name_ijazah = 'ijazah-' . strtolower($ijazah->getClientOriginalName());
                $ijazah->move('public/upload_file',strtolower('ijazah-' . $ijazah->getClientOriginalName()));
            }

            if($request->hasFile('karyailmiah'))
            {
                $karyailmiah = $request->file('karyailmiah');
                $name_karyailmiah = 'karyailmiah-' . strtolower($karyailmiah->getClientOriginalName());
                $karyailmiah->move('public/upload_file',strtolower('karyailmiah-' . $karyailmiah->getClientOriginalName()));
            }

           $file = File::create([
                'user_id'    => $request->get('user_id'),
                'file_rekom' => $name_rekom,
                'file_foto' => $name_foto,
                'file_cv'    => $name_cv,
                'file_ktp'    => $name_ktp,
                'file_ijazah' => $name_ijazah,
                'file_transkrip' => $name_transkrip,
                'file_karyailmiah' => $name_karyailmiah,
                'status'     => 'pending'
           ]);
           return response()->json([
            'msg' => 'success',
            'data' => $file
        ], 200);
        }

        
    }

    public function show($user_id){
        return response()->json(['msg'=> 'data berhasil diambil', 'data'=>File::where('user_id',$user_id)->first()]);
    }
}
