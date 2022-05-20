<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\Profile;
use Illuminate\Http\Request;

class ApiProfileController extends Controller
{
    public function index()
    {
        $data = Profile::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function show($id)
    {
        $data = Profile::find($id);
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = Profile::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $data]);
    }
    
    public function update(Request $request, $id)
    {
        $data = Profile::find($id);
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = Profile::find($id);
        $data->delete();
        return response()->json(['message' => 'Success', 'data' => null]);
    }

}
