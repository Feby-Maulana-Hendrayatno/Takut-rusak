<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use Illuminate\Support\Facades\Storage;


class RumahController extends Controller
{
    public function index()
    {
        $rumah =
            [
                Rumah::orderBy('id', 'DESC')->get()
                // $response = [
                //     'message' => 'List coba order by id',
                //     'data' => $rumah
            ];

        return view("App/Models/Rumah", $rumah);
        // return response()->json($response, 200);
        // return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $rumah = [
            "data_rumah" => Rumah::all()
        ];

        return view("App/Models/addrumah/index", $rumah);
    }

    public function tambah_data()
    {
        return view("");
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
            "nama_rumah" => "required",
            "deskrispsi" => "required",
            "harga" => "required",
            "alamat" => "required",
            "kontak" => "required",
            "foto" => "image_url"
        ]);

        if ($request->file("foto")) {
            $validateData['foto'] = $request->file("foto")->store("image");
        }

        // Rumah::create($validateData);
        // User::create([
        //     "name" => $request->nama_rumah,
        //     "email" => $request->nama_rumah."@gmail.com",
        //     "password" => bcrypt("admin"),
        //     "id_role" => 2
        // ]);

        return redirect("/admin/Rumah")->with("tambah", "Data Berhasil di Tambahkan");
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
            "edit" => Rumah::where("id", $id)->first()
        ];
        return view("/admin/Rumah/edit_Rumah", $data);
    }

    public function detail($id)
    {
        $data = [
            "deskripsi" => Rumah::where("id", $id)->first()
        ];

        return view("/admin/Rumah/detail_Rumah", $data);
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
            "nama_rumah" => "required",
            "deskripsi" => "required",
            "harga" => "required",
            "alamat" => "required",
            "kontak" => "required",
            "foto" => "image"
        ]);

        if ($request->file("foto")) {

            if ($request->Image) {p
                Storage::delete($request->Image);
            }

            $validateData['foto'] = $request->file("foto")->store("image");
        }

        Rumah::where("id", $request->id)->update($validateData);


        return redirect("/admin/Rumah")->with("update", "Data Berhasil di update");
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

        $data = Rumah::where("id", $request->id)->first();

        $nama_rumah = $data->nama_rumah;

        Rumah::where("id", $request->id)->delete();

        Rumah::where("name", $nama_rumah)->delete();

        return redirect()->back();
    }
}
