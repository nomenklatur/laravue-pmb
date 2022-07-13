<?php

namespace App\Http\Controllers;

use App\Biodata;
use App\User;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    //

    public function show($user_id){
        return Biodata::where('user_id', $user_id)->first();
    }

    public function store(){
        request()->validate([

        ]);

        $bio = Biodata::create([
            'user_id' => request('user_id'),
            'place_of_birth' => request('place_of_birth'),
            'gender' => request('gender'),
            'mother_name' => request('mother_name'),
            'date_of_birth' => request('date_of_birth'),
            'religion' => request('religion'),
            'nik' => request('nik'),
            'nisn' => request('nisn'),
            'npwp' => request('npwp'),
            'citizenship' => request('citizenship'),
            'nama_jalan' => request('nama_jalan'),
            'dusun' => request('dusun'),
            'rt' => request('rt'),
            'rw' => request('rw'),
            'kelurahan' => request('kelurahan'),
            'kode_pos' => request('kode_pos'),
            'kecamatan' => request('kecamatan'),
            'kabupaten' => request('kabupaten'),
            'jenis_tinggal' => request('jenis_tinggal'),
            'alat_transfortasi' => request('alat_transfortasi'),
            'telepon' => request('telepon'),
            'hp' => request('hp'),
            'email' => request('email'),
            'kps' => request('kps'),
            'nomor_kps' => request('nomor_kps'),
            'nik_ayah' => request('nik_ayah'),
            'nama_ayah' => request('nama_ayah'),
            'tgl_lahir_ayah' => request('tgl_lahir_ayah'),
            'pendidikan_ayah' => request('pendidikan_ayah'),
            'pekerjaan_ayah' => request('pekerjaan_ayah'),
            'penghasilan_ayah' => request('penghasilan_ayah'),
            'nik_ibu' => request('nik_ibu'),
            'nama_ibu' => request('nama_ibu'),
            'tgl_lahir_ibu' => request('tgl_lahir_ibu'),
            'pendidikan_ibu' => request('pendidikan_ibu'),
            'pekerjaan_ibu' => request('pekerjaan_ibu'),
            'penghasilan_ibu' => request('penghasilan_ibu'),
            'nik_wali' => request('nik_wali'),
            'nama_wali' => request('nama_wali'),
            'tgl_lahir_wali' => request('tgl_lahir_wali'),
            'pendidikan_wali' => request('pendidikan_wali'),
            'pekerjaan_wali' => request('pekerjaan_wali'),
            'penghasilan_wali' => request('penghasilan_wali'),
            'activated' => '1',
        ]);

        return response()->json([
            'msg' => 'berhasil input data',
            'data' => $bio
        ]);
    }

    public function update(){
        $bio = Biodata::where('user_id', request('user_id'))->update([
            'place_of_birth' => request('place_of_birth'),
            'gender' => request('gender'),
            'mother_name' => request('mother_name'),
            'date_of_birth' => request('date_of_birth'),
            'religion' => request('religion'),
            'nik' => request('nik'),
            'nisn' => request('nisn'),
            'npwp' => request('npwp'),
            'citizenship' => request('citizenship'),
            'nama_jalan' => request('nama_jalan'),
            'dusun' => request('dusun'),
            'rt' => request('rt'),
            'rw' => request('rw'),
            'kelurahan' => request('kelurahan'),
            'kode_pos' => request('kode_pos'),
            'kecamatan' => request('kecamatan'),
            'kabupaten' => request('kabupaten'),
            'jenis_tinggal' => request('jenis_tinggal'),
            'alat_transfortasi' => request('alat_transfortasi'),
            'telepon' => request('telepon'),
            'hp' => request('hp'),
            'email' => request('email'),
            'kps' => request('kps'),
            'nomor_kps' => request('nomor_kps'),
            'nik_ayah' => request('nik_ayah'),
            'nama_ayah' => request('nama_ayah'),
            'tgl_lahir_ayah' => request('tgl_lahir_ayah'),
            'pendidikan_ayah' => request('pendidikan_ayah'),
            'pekerjaan_ayah' => request('pekerjaan_ayah'),
            'penghasilan_ayah' => request('penghasilan_ayah'),
            'nik_ibu' => request('nik_ibu'),
            'nama_ibu' => request('nama_ibu'),
            'tgl_lahir_ibu' => request('tgl_lahir_ibu'),
            'pendidikan_ibu' => request('pendidikan_ibu'),
            'pekerjaan_ibu' => request('pekerjaan_ibu'),
            'penghasilan_ibu' => request('penghasilan_ibu'),
            'nik_wali' => request('nik_wali'),
            'nama_wali' => request('nama_wali'),
            'tgl_lahir_wali' => request('tgl_lahir_wali'),
            'pendidikan_wali' => request('pendidikan_wali'),
            'pekerjaan_wali' => request('pekerjaan_wali'),
            'penghasilan_wali' => request('penghasilan_wali'),
            'activated' => '1',
        ]);

        $user = User::where('id', request('user_id'))->update([
            'name' => request('name')
        ]);

        return response()->json([
            'msg' => 'berhasil ubah data',
            'data' => $bio
        ]);
    }
}
