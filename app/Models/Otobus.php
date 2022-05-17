<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otobus extends Model
{
    use HasFactory;

    protected $table = "otobusler";
    protected $fillable = [
        "plaka"
    ];

    public $timestamps = false;

    public function koltuklar(){
        return $this->hasMany(\App\Models\Koltuk::class);
    }

    public function sefer(){
        return $this->hasOne(\App\Models\Sefer::class);
    }
}
