<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Otobus;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view("auth.login");
});
Route::group(["middleware" => ['auth']],function(){
        Route::resource("rezervasyon"  ,"RezervasyonController");
        Route::resource("guzergah"  ,"GuzergahController");
        Route::resource("sefer"  ,"SeferController");
        Route::resource("arac","OtobusController")->parameters([
            'arac' => "otobus"
        ]);
        Route::get("/otobus/{id}/koltuk","OtobusController@musaitkoltuk")->name("otobus.koltuk");
        Route::get("/seferotobuscek/{id}","OtobusController@seferotobuscek");

        Route::middleware("admin")->group(function(){
            Route::resource("user","UserController");

            Route::get("yetkiliste","UserController@yetkiUserListe")->name("yetkiliste");
            Route::put("yetkiguncelle/{kullanici}","UserController@yetkiGuncelle")->name("yetki.update");
        });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
