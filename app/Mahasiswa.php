<?php

namespace App;

use App\Events\NewBeasiswaEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;


    protected $guarded = [];
    protected $table = 'mahasiswa';


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function prodi(){
        return $this->belongsTo(Prodi::class,'id_prodi','id');
    }

    public function beasiswa(){
      return $this->hasMany(Beasiswa::class, 'id_mahasiswa','id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }


}
