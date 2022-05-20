<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    
    public function tambah(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" => $request->id_role,
            "password" => bcrypt($request->password)
        ]);

        return redirect("/login")->with("sukses");
    }
    
    public function simpan(Request $request)
    {
        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" =>  $request->id_role,
            "password" => bcrypt($request->password),

        ]);

        return redirect("/users");
    }
}
