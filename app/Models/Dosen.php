<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    //
    protected $fillable = ['nama', 'nik', 'email', 'nohp','alamat','keahlian'];
    use SoftDeletes;
}
