<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezervasyon;
use App\Models\User;
use App\Models\Koltuk;
use App\Models\Sefer;

class RezervasyonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rezervasyonlar = Rezervasyon::with("koltuk.otobus","user","sefer")->get();
        return view("rezervasyon.index",[
            "rezervasyonlar" => $rezervasyonlar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otobusler = \App\Models\Otobus::whereHas("koltuklar", function($query){
            $query->where("dolu_durum",false);
        })->get();

        $seferler = Sefer::All();

        $uyeler = User::orderBy("id","asc")->get();
        return view("rezervasyon.create",[
            "otobusler" => $otobusler,
            "seferler" => $seferler,
            "uyeler" => $uyeler
        ]);
    }

    /**
         * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "user_id" => "required",
            "koltuk_id" => "required",
            "sefer_id" => "required"
        ]);

       Rezervasyon::create($request->all());

        try {
//          Koltuk doluluk kontrol
            $koltuk = Koltuk::findOrFail($request->koltuk_id);
            $koltuk->dolu_durum = true;
            $koltuk->save();

            $sefer = Sefer::findOrFail($request->sefer_id);
        }
        catch (\Exception $ex){
            return redirect()->route("rezervasyon.create")->with("error","Bilinmeyen bir id değeri seçildi");
        }


        return redirect()->route("rezervasyon.index")->with("success","Rezervasyon oluşturma işlemi başarılı");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rezervasyon $rezervasyon)
    {
        $rezervasyon->delete();

        $koltuk = Koltuk::find($rezervasyon->koltuk_id);
        $koltuk->dolu_durum = false;
        $koltuk->save();
        return redirect()->route("rezervasyon.index")->with("success","Silme işlemi başarılı");
    }
}
