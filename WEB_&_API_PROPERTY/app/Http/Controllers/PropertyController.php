<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function showAllProperty()
    {
        // return response()->json(property:all());
        $property = Property::all();
        return response()->json(['message' => 'success', 'data' => $property ]);
    }

    public function showOneProperty($id)
    {
        // return response()->json(property:find($id));
        $property = Property::find($id);
        return response()->json(['message' => 'success', 'data' => $property ]);
    
    }

    public function create(Request $request)
    {
        $property = Property::create($request->all());
        return response()->json(['message' => 'Data berhasil diinputkan', 'data' => $property ]);
    }

    public function update($id, Request $request)
    {
        $property = Property::find($id);
        $property->update($request->all());
        // return response()->json($property, 200);
        return response()->json(['message' => 'Data berhasil diupdate', 'data' => $property ]);
    }

    public function delete($id)
    {
        // property:findOrFail($id)->delete();
        // return response('Deleted Successfully', 200);

        $property = Property::find($id)->delete();
        return response()->json(['message' => 'success', 'data' => $property ]);
    }

    public function index()
    {
        $property = Property::all();
        // return response()->json(['message' => 'Successfully', 'data' => $property ]);
        return response()->json(['message' => 'success', 'data' => null ]);
    }
}
