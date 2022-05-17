<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otobus;
use App\Models\Koltuk;
use App\Models\Sefer;
class OtobusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otobusler = Otobus::ALl();
        return view("otobus.index",[
            "otobusler" => $otobusler
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("otobus.create");
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
            "plaka" => "required|unique:otobusler,plaka"
        ]);

        $otobus = new Otobus([
            "plaka" => $request->plaka
        ]);
//      Burada 1'den 20'ye kadar koltuklar oluşturup bunların yeni oluşan otobüse atamasını gerçekleştiriyoruz.
        for ($i=1; $i<=20; $i++){
            $dizi[] = new Koltuk([
                "numara" => $i
            ]);
        }
        $otobus->save();
        $otobus->koltuklar()->savemany($dizi);
        return redirect()->route("arac.create")->with("success","Otobüs ekleme işlemi başarılı");
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
    public function edit(Otobus $otobus)
    {
        return view("otobus.edit",compact("otobus"));
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
        $request->validate([
            "plaka" => "required|unique:otobusler,plaka,".$id
        ]);

        $otobus = Otobus::findOrFail($id);
        $otobus->plaka = $request->plaka;
        $otobus->save();

        return redirect()->route("arac.index")->with("success","Araç güncelleem  işlemi başarılı");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $otobus = Otobus::findOrFail($id);
        $otobus->delete();

        return redirect()->route("arac.index")->with("success","Silme  işlemi başarılı");
    }

    public  function musaitkoltuk($id){
        $musaitKoltuk = Koltuk::where("otobus_id",$id)->where("dolu_durum",false)->get();
        return json_encode($musaitKoltuk);
    }

    public function  seferotobuscek($id){
        $sefer = Sefer::findOrFail($id);
        return json_encode($sefer->otobus);
    }
}
