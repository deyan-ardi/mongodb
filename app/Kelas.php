<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kelas extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "kelas";
    protected $fillable = ["nama_kelas", "prodi", "fakultas"];
}
