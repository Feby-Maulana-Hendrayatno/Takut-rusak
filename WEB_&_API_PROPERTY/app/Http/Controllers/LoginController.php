<?php

namespace App\Http\Controllers;

use App\Models\TerakhirLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("/auth/login");
    }

    public function post_login(Request $request)
    {

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {

            $request->session()->regenerate();

            $data = auth()->user()->id_role;

            TerakhirLogin::create([
                "name" => auth()->user()->name,
                "id_user" => auth()->user()->id
            ]);

            if ($data == 2) {

                return redirect("/owner/dashboard")->with("sukses", "Anda Berhasil Login");

            } else if ($data == 1) {
                return redirect("/admin/dashboard")->with("sukses", "Anda Berhasil Login");

            }

        } else {
            return redirect()->back();
        }

    }

    public function logout()
    {
        Auth::logout();

            return redirect("/login");
    }
}
