<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatih;
use File;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
// use App\Models\PelatihKategoriTari;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // = SELECT * FROM pelatih;
        $data = [
            "data_pelatih" => Pelatih::orderBy("id", "DESC")->get()
        ];

        return view("/admin/pelatih/data_pelatih", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // = SELECT * FROM pelatih;
        $data = [
        "data_pelatih" => Pelatih::all()
    ];

    return view("/admin/pelatih/addpelatih/index", $data);
    }

    public function tambah_data()
    {
        return view("/admin/pelatih/addpelatih");
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            "nama_pelatih" => "required",
            "jenis_kelamin" => "required",
            "umur" => "required",
            "no_hp" => "required",
            "alamat" => "required",
            "foto" => "image"
        ]);

        if ($request->file("foto")) {
            $validateData['foto'] = $request->file("foto")->store("image");
        }

        Pelatih::create($validateData);
        User::create([
            "name" => $request->nama_pelatih,
            "email" => $request->nama_pelatih."@gmail.com",
            "password" => bcrypt("pelatih"),
            "id_role" => 2
        ]);



        return redirect("/admin/pelatih")->with("tambah", "Data Berhasil di Tambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "edit" => Pelatih::where("id", $id)->first()
        ];
        return view("/admin/pelatih/edit_pelatih", $data);

    }

    public function detail($id)
    {
        $data = [
            "detail" => Pelatih::where("id", $id)->first()
        ];

        return view("/admin/pelatih/detail_pelatih", $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
            "nama_pelatih" => "required",
            "jenis_kelamin" => "required",
            "umur" => "required",
            "no_hp" => "required",
            "alamat" => "required",
            "foto" => "image"
        ]);

        if ($request->file("foto")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['foto'] = $request->file("foto")->store("image");
        }

        Pelatih::where("id", $request->id)->update($validateData);

        return redirect("/admin/pelatih")->with("update", "Data Berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if ($request->foto) {
            Storage::delete($request->foto);
        }

        $data = Pelatih::where("id", $request->id)->first();

        $nama_pelatih = $data->nama_pelatih;

        Pelatih::where("id", $request->id)->delete();

        User::where("name", $nama_pelatih)->delete();

        // PelatihKategoriTari::where("id_pelatih", $id_pelatih)->delete();

        return redirect()->back();
    }
}
