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
        Schema::create("seferler",function (Blueprint $table){
            $table->id();
            $table->timestamp("kalkis_tarihi");
            $table->foreignId("otobus_id")->constrained("otobusler");
            $table->foreignId("guzergah_id")->constrained("guzergahlar");
            $table->timestamps();
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
