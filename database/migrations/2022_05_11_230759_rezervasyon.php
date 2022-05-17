<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("rezervasyon",function (Blueprint $tablo){
            $tablo->id();
            $tablo->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $tablo->foreignId("koltuk_id")->constrained("koltuklar")->onDelete("cascade");
            $tablo->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
