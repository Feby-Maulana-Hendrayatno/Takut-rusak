<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            "data_role" => Role::orderBy("nama_role", "ASC")->get()
        ];

        return view("/admin/role/data_role", $data);
    }

    public function tambah(Request $request)
    {
        Role::create($request->all());

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        Role::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => Role::where("id", $id)->first(),
            "data_role" => Role::where("id", "!=", $id)->orderBy("nama_role", "ASC")->get()
        ];

        return view("/admin/role/edit_role", $data);
    }

    public function simpan(Request $request)
    {
        Role::where("id", $request->id)->update([
            "nama_role" => $request->nama_role
        ]);

        return redirect("/admin/role");
    }
}
