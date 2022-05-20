<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeskripsiRumah;

class DeskripsiRumahController extends Controller
{
    public function index()
    {
        $data = [
            "deskripsi" => DeskripsiRumah::orderBy("id", "ASC")->get()
        ];

        return view("/owner/deskripsi_rumah/data_deskripsi_rumah", $data);
    }

    public function tambah(Request $request)
    {
        return view("/owner/deskripsi_rumah/add_deskripsi");
    }


    public function tambah_data(Request $request)
    {
        $validateData = $request->validate([
            "type" => "required",
            "kusen" => "required",
            "pintu" => "required",
            "jendela" => "required",
            "plafond" => "required",
            "air" => "required",
            "listrik" => "required",
            "pondasi" => "required",
            "dinding" => "required",
            "lantai" => "required",
            "atap" => "required",
            "wc" => "required",
            "harga" => "required"
        ]);
        DeskripsiRumah::create($validateData);

        return redirect("/owner/deskripsi_rumah/deskripsi")->with("tambah", "Data Berhasil di Tambahkan");
    }

    public function edit($id)
    {
        $data = [
            "edit" => DeskripsiRumah::where("id", base64_decode($id))->first(),
        ];

        return view("owner.deskripsi_rumah.edit_deskripsi", $data);
    }

    public function simpan(Request $request)
    {

        DeskripsiRumah::where("id", $request->id)->update([
            "type" => $request->type,
            "kusen" => $request->kusen,
            "pintu" => $request->pintu,
            "jendela" => $request->jendela,
            "plafond" => $request->plafond,
            "air" => $request->air,
            "listrik" => $request->listrik,
            "pondasi" => $request->pondasi,
            "dinding" => $request->dinding,
            "lantai" => $request->lantai,
            "atap" => $request->atap,
            "wc" => $request->wc,
            "harga" =>$request->harga
        ]);

        return redirect("/owner/deskripsi_rumah/deskripsi");
    }


    public function hapus(Request $request)
    {
        DeskripsiRumah::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function detail_deskripsi(Request $request)
    {
        $data = [
            "detail" => DeskripsiRumah::where("id", $request->id)->first()
        ];

        return view("owner.deskripsi_rumah.detail_deskripsi", $data);
    }
}
