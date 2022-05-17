<?php

namespace App\Http\Controllers;
use App\Models\Sefer;
use App\Models\Otobus;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SeferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $seferler = Sefer::with("otobus","guzergah")->get();
        return view("sefer.index",compact("seferler"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otobusler = \App\Models\Otobus::where("musait_durum",true)->get();
        $guzergahlar = \App\Models\Guzergah::All();


        return view("sefer.create",[
            "otobusler" => $otobusler,
            "guzergahlar" => $guzergahlar
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
            "otobus_id" => "required",
            "guzergah_id" => "required",
            "kalkis_tarihi" => "required"
        ]);
//        Datetimepicker'den gelen tarihi mysql için formatlıyoruz.
          $yeniTarihFormati = date("Y-m-d H:i:s",strtotime($request->kalkis_tarihi));

          $suAn = Carbon::now();
          if($suAn->gt($yeniTarihFormati)){
              return redirect()->route("sefer.create")->with("error","Geri bir tarihe sefer açılamaz")->withInput();
          }

        $otobus = Otobus::findOrFail($request->otobus_id);
        if($otobus->musait_durum){
            Sefer::create([
                "otobus_id" => $request->otobus_id,
                "guzergah_id" => $request->guzergah_id,
                "kalkis_tarihi" => $yeniTarihFormati
            ]);
        }

        $otobus->musait_durum = false;
        $otobus->save();


        return redirect()->route("sefer.index")->with("success","Sefer başarılı bir şekilde eklendi");

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
    public function destroy($id)
    {
        $sefer = Sefer::findOrFail($id);

        $sefer->delete();

        $otobus = Otobus::find($sefer->otobus_id);
        $otobus->musait_durum = true;
        $otobus->save();

        return  redirect()->route("sefer.index")->with("success","Silme işlemi başarılı");
    }
}
