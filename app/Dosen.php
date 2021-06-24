<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Dosen extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "dosen";
    protected $fillable = ["nip_dosen","nama_dosen","prodi","fakultas"];
}
