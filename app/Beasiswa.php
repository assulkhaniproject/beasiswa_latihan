<?php

namespace App;

use App\Events\NewBeasiswaEvent;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $guarded = [];
    protected $table = 'beasiswa';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    
}
