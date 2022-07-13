<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->text('place_of_birth');
            $table->text('gender');
            $table->text('mother_name');
            $table->text('date_of_birth');
            $table->text('religion');
            $table->string('nik');
            $table->string('nisn');
            $table->string('npwp');
            $table->string('citizenship');
            $table->string('nama_jalan');
            $table->string('dusun');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('jenis_tinggal');
            $table->string('alat_transfortasi');
            $table->string('telepon');
            $table->string('hp');
            $table->string('email');
            $table->enum('kps', ['ya', 'tidak']);
            $table->string('nomor_kps');
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->integer('penghasilan_ayah');
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->integer('penghasilan_ibu');
            $table->string('nik_wali');
            $table->string('nama_wali');
            $table->date('tgl_lahir_wali');
            $table->string('pendidikan_wali');
            $table->string('pekerjaan_wali');
            $table->integer('penghasilan_wali');
            $table->enum('activated', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
}
