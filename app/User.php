<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','username','role','image', 'password','no_hp', 'activated', 'degress', 'prodi', 'year', 'test_number', 'prodi_1'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function biodata(){
        return $this->hasOne(Biodata::class);
    }

    public function results(){
        return $this->hasMany(Result::class);
    }

    public function upload(){
        return $this->hasOne(Upload::class);
    }

    public function file(){
        return $this->hasOne(File::class);
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi');
    }

    public function prodi1(){
        return $this->belongsTo(Prodi::class, 'prodi_1');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
