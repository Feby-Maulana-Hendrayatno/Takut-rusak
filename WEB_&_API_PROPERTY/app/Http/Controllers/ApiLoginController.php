<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        if (\Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )) {
            $user = \Auth::user();
            $user->update([
                'token' => bin2hex(random_bytes(40))
            ]);
            $data['user']  = $user;
            return response()->json(
                [
                    'success' => true,
                    'data' => $data,
                    'pesan' => 'Login Berhasil'
                ], 200
            );


        }else{
            return response()->json(
                [
                    'success' => false,
                    'data' => '',
                    'pesan' => 'Login Gagal'
                ], 401
            );
        }
    }
}
