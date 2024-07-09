<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pustakawan extends Model
{
    protected $fillable = ['nip', 'nama', 'alamat', 'jenis_kelamin'];
}
