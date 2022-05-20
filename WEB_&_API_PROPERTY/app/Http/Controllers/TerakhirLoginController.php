<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerakhirLogin;
use Illuminate\Support\Facades\Auth;

class TerakhirLoginController extends Controller
{
    public function index()
    {
        $data = [
            "data_login" => TerakhirLogin::where('id_user', Auth::user()->id)->latest()->limit(4)->get()
        ];

        return view("admin.terakhir_login.terakhir_login", $data);
    }
}
