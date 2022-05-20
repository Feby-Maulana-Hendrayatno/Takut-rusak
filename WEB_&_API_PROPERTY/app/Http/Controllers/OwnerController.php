<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard()
    {
        return view("/owner/dashboard");
    }
    public function template_owner()
    {
    	return view("layouts/template_owner");
    }
}
