<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syarat;
use Illuminate\Support\Facades\Auth;

class SyaratController extends Controller
{
    public function index()
    {
        $data = [
            "syarat" => Syarat::where('id_user', Auth::user()->id)->get()
        ];

        return view("/owner/syarat/data_syarat", $data);
    }

    public function tambah(Request $request)
    {
        Syarat::create([
            "syarat" => $request->syarat,
            "id_user" => Auth::user()->id
        ]);
        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        Syarat::where("id", $request->id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Syarat::where("id", $request->id)->first()
        ];

        return view("/owner/syarat/edit_syarat", $data);
    }

    public function simpan(Request $request)
    {
        Syarat::where("id", $request->id)->update([
            "syarat" => $request->syarat
        ]);

        return redirect("/owner/syarat/syarat");
    }
}
