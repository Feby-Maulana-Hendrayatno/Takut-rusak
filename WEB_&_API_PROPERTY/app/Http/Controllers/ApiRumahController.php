<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\Rumah;
use Illuminate\Http\Request;

class ApiRumahController extends Controller
{
    public function index()
    {
        $data = Rumah::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function show($id)
    {
        $data = Rumah::find($id);
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = Rumah::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = Rumah::find($id);
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Rumah::find($id);
        $data->delete();
        return response()->json(['message' => 'Success', 'data' => null]);
    }
}
