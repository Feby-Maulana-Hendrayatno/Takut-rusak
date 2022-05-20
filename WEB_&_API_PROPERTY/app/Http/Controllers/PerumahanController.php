<?php

namespace App\Http\Controllers;
use App\Models\Perumahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    public function index()
    {
        $data = [
            "perumahan" => Perumahan::where('id_user', Auth::user()->id)->get()
        ];

        return view("owner.perumahan.data_perumahan", $data);
    }

    public function tambah(Request $request)
    {
        if ($request->file("foto")) {
            $coba = $request->file("foto")->store("image");
        }

        Perumahan::create([
            "nama_perumahan" => $request->nama_perumahan,
            "alamat" => $request->alamat,
            "stok" => $request->stok,
            "uraian" => $request->uraian,
            "foto" => $coba,
            "id_user" => Auth::user()->id
        ]);


        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        Perumahan::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Perumahan::where("id", $request->id)->first(),
            // "perumahan" => Perumahan::where("id", "!=", $id)->orderBy("nama_perumahan", "ASC")->get()
        ];

        return view("/owner/perumahan/edit_perumahan", $data);
    }



    public function simpan(Request $request)
    {
        // $validateData = $request->validate([
        //     "nama_perumahan" => "required",
        //     "alamat" => "required",
        //     "stok" => "required",
        //     "uraian" => "required",
        //     "foto" => "image"
        // ]);

        // if ($request->file("image")) {

        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }

        //     $validateData['foto'] = $request->file("foto")->store("image");

        // }
        //     Perumahan::where("id", $request->id)->update($validateData);








        if ($request->file("foto")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $coba = $request->file("foto")->store("image");
        }

        // if ($request->file("gambar")) {
        //     if ($request->oldGambar) {
        //         Storage::delete($request->oldGambar);
        //     }

        //     $coba = $request->file("gambar")->store("foto");
        // }

        Perumahan::where("id", $request->id)->update([
            "nama_perumahan" => $request->nama_perumahan,
            "alamat" => $request->alamat,
            "stok" => $request->stok,
            "uraian" => $request->uraian,
            "foto" => $coba
        ]);

        return redirect()->back();
    }
}
