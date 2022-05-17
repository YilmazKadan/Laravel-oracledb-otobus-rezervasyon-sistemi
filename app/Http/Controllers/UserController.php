<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kullanicilar = User::orderBy("yetki","DESC")->get();
        return view("user.index",compact("kullanicilar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
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
            "ad" => "required",
            "email" => "required|unique:users",
            "password" => "required"
        ]);

        User::create([
            "ad" => $request->ad,
            "email" => $request->email,
            "password" =>Hash::make($request->password)
        ]);

        return redirect()->route("user.index")->with("success","Kullanıcı oluşturma işlemi başarılı bir şekilde oluştu");
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
        $user = User::findOrFail($id);

        return view("user.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "ad" => "required",
            "email" => "required|unique:users,email,".$user->id,
        ]);

        $user->ad = $request->ad;
        $user->email = $request->email;
        $user->save();


        return redirect()->route("user.index")->with("success","Kullanıcı günceleme işlemi başarılı bir şekilde oluştu");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    $user->delete();

        return redirect()->route("user.index")->with("success","Silme  işlemi başarılı bir şekilde oluştu");
    }

    public  function yetkiUserListe(){

        $kullanicilar = User::orderBy("yetki","DESC")->get();
        return view("user.yetkiliste",compact("kullanicilar"));
    }
    public function yetkiGuncelle(User $kullanici, Request $request){
         $request->validate([
            "yetki_id" => "required"
         ]);
         if(!in_array($request->yetki_id,[1,2])){
             return redirect()->route("yetkiliste")->with("error","Bilinmeyen bir yetki türü seçildi!");
         }
         $kullanici->yetki = $request->yetki_id;
         $kullanici->save();
         return redirect()->route("yetkiliste")->with("success","Yetkilendirme işlemi başarılı bir şekilde oluştu");
    }
}
