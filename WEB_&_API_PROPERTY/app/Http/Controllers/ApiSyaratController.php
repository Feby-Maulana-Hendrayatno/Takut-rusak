<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syrat;

class ApiSyaratController extends Controller
{
    public function index()
    {
        return response()->json(Syrat::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'file' => 'required',
            ]
        );
        $path = $request->file('file')->store('public/syarats');
        $syarat = new Syrat();
        $syarat->nama = $request->nama;
        $syarat->file = $pathFile = $request->file('file');
        $syarat->user_id = $request->user()->id;
        $syarat->status = 0;
        $syarat->save();
        return response()->json($syarat, 201);
    }
}
