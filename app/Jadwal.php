<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Jadwal extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "jadwal";
    protected $fillable = ["nama_dosen", "nama_kelas", "jadwal", "matkul"];
}


