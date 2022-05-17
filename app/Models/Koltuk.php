<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koltuk extends Model
{
    use HasFactory;

    protected $table = "koltuklar";
    protected $fillable = [
        "numara"
    ];

    public $timestamps = false;


    public function otobus(){
        return $this->belongsTo(\App\Models\Otobus::class,"otobus_id","id");
    }
}
