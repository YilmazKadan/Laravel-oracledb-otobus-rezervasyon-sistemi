<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guzergah;
class GuzergahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guzergahlar = Guzergah::ALl();
        return view("guzergah.index",[
            "guzergahlar" => $guzergahlar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("guzergah.create");
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
            "nereden" => "required",
            "nereye" => "required"
        ]);

       $guzergah =  Guzergah::where("nereden",$request->nereden)->where("nereye",$request->nereye)->get();

       if($guzergah->first()){
           return redirect()->route("guzergah.create")->with("error","Bu güzergah daha önce eklenmiş");
       }

       Guzergah::create([
           "nereden" => $request->nereden,
           "nereye" => $request->nereye
       ]);

       return  redirect()->route("guzergah.index")->with("success","Başarılı bir şekilde eklendi");
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
        $guzergah = Guzergah::findOrFail($id);
        $guzergah->delete();

        return redirect()->route("guzergah.index")->with("success","Silme  işlemi başarılı");
    }
}
