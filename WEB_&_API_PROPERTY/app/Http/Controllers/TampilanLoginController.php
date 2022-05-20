<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TampilanLoginController extends Controller
{
    public function TampilanLogin()
    {
        return view("/auth/login");
    }

    public function TampilanRegistrasi()
    {
        return view("/auth/register");
    }
}
