<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guzergah extends Model
{
    use HasFactory;

    protected $table = "guzergahlar";
    protected $fillable = [
        "nereden",
        "nereye"
    ];
}
