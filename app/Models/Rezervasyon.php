<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervasyon extends Model
{
    use HasFactory;

    protected $table =  "rezervasyon";
    protected $fillable = [
        "user_id",
        "sefer_id",
        "koltuk_id"
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class,"user_id","id");
    }

    public function koltuk(){
        return $this->belongsTo(\App\Models\Koltuk::class,"koltuk_id","id");
    }
    public function sefer(){
        return $this->belongsTo(\App\Models\Sefer::class,"sefer_id","id");
    }
}
