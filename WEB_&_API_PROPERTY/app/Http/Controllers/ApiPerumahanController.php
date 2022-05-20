<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use Illuminate\Http\Request;

class ApiPerumahanController extends Controller
{
    public function index()
    {
        $data = Perumahan::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function detail($id)
    {
        $data = Perumahan::find($id);
        return response()->json(['message' => 'Success', 'data' => $data]);
    }
}
