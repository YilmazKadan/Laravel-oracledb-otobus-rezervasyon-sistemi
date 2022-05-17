<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sefer extends Model
{
    use HasFactory;

    protected $table = "seferler";
    protected $fillable = [
        "kalkis_tarihi",
        "otobus_id",
        "guzergah_id"
    ];


    public function otobus(){
       return  $this->belongsTo(\App\Models\Otobus::class);
    }
    public function guzergah(){
       return  $this->belongsTo(\App\Models\Guzergah::class);
    }
}
