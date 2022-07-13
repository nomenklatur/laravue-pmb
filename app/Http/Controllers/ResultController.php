<?php

namespace App\Http\Controllers;

use App\Question;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //
    
    public function show($user_id){
        $result = Result::where('user_id', $user_id)->orderBy('index', 'asc')->get();
        return $result;
    }

    public function showData($user_id){
        $result = Result::where('user_id', $user_id)->orderBy('index', 'asc')->get();
        $benar = Result::whereColumn('answer', '=', 'key_answer')->where('user_id', $user_id)->get()->count();
        $salah = Result::whereColumn('answer', '<>', 'key_answer')->where('user_id', $user_id)->get()->count();
        $kosong = Result::where([['answer', '=', null],['user_id', '=', $user_id]])->get()->count();
        $user = User::where('id', $user_id)->first();
        $total = Question::all()->count();
        return response()->json([
            'user' => $user,
            'data' => $result,
            'benar'=> $benar,
            'salah'=> $salah,
            'kosong'=> $kosong,
            'total'=> $total
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $result = Result::where('user_id',  $data[0]['user_id'])->first();
        if ($result === null) {
            foreach ($data as $item) {
                // return $item['user_id'];
                Result::create([
                    'question_id' => $item['question_id'],
                    'user_id' => $item['user_id'],
                    'answer' => $item['answer'],
                    'key_answer' => $item['key_answer'],
                    'doubt' => $item['doubt'],
                    'finish' => $item['finish'],
                    'index' => $item['index'],
                ]);
            }
        } else {

            foreach ($data as $item) {
                // return $item['user_id'] ;
               $update = Result::where(
                    ['user_id'=>$item['user_id'], 'index'=>$item['index']]
                )->update([
                    'question_id' => $item['question_id'],
                    'answer' => $item['answer'],
                    'key_answer' => $item['key_answer'],
                    'doubt' => $item['doubt'],
                    'finish' => $item['finish'],
                ]);
            }
        }
        return response()->json([
            'data' => Result::where('user_id', $data[0]['user_id'])->get(),
        ]);
    }

    public function storeOne(Request $request){
        $cekResult = Result::where([['user_id', '=', $request->user_id], ['index', '=', $request->index]])->first();
        if($cekResult == null ){
            Result::create([
                            'question_id' => $request->question_id,
                            'user_id' => $request->user_id,
                            'answer' => $request->answer,
                            'key_answer' => $request->key_answer,
                            'doubt' => $request->doubt,
                            'finish' => $request->finish,
                            'index' => $request->index,
                        ]);
        }else{
            $update = Result::where(
                            ['user_id'=>$request->user_id, 'index'=>$request->index]
                        )->update([
                            'question_id' => $request->question_id,
                            'answer' => $request->answer,
                            'key_answer' => $request->key_answer,
                            'doubt' => $request->doubt,
                            'finish' => $request->finish,
                        ]);
        }
        return response()->json([
            'data' => $cekResult
        ]);
    }
}
