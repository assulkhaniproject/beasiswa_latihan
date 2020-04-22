<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Prodi extends Authenticatable
{
    protected $guarded = [];
    protected $table = 'prodi';
}
