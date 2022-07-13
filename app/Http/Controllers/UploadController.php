<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function store(Request $request){
        $img = Upload::where('user_id', request('user_id'))->count();
        if($img>0){
            if($request->hasFile('file'))
            {
                $image = $request->file('file');
                $name  = 'image_' . date("Y-m-d-h").'.'.$image->getClientOriginalExtension();
                $image->move('public/images','image_' . date("Y-m-d-h").'.'.$image->getClientOriginalExtension());
            }

           Upload::where('user_id', $request->get('user_id'))->update([
                'image' => $name
           ]);
           return response()->json(['msg' => 'Berhasil upload bukti'], 200);
        }else{
            if($request->hasFile('file'))
            {
                $image = $request->file('file');
                $name  = 'image_' . date("Y-m-d-h").'.'.$image->getClientOriginalExtension();
                // $image->move('public/images','image_' . date("Y-m-d-h:i:sa").'.'.$image->getClientOriginalExtension());
                $image->move('public/images','image_' . date("Y-m-d-h").'.'.$image->getClientOriginalExtension());

            }
    
           $image= new Upload();
           $image->user_id=$request->get('user_id');
           $image->image = $name;
           $image->save();
           return response()->json(['msg' => 'Berhasil upload bukti'], 200);
        }
      
    }

    public function show($id){
        return response()->json(['msg'=> 'data berhasil diambil', 'data'=>Upload::where('user_id',$id)->first()]);
    }
}
