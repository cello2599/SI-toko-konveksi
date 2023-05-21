<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class AuthController extends Controller
{
    function postLogin(Request $request)
    {
            // kode program Anda
            //validasi login
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $admin = [
            'name' => $request->name,
            'password' => $request->password
        ];
        
        if(Auth::attempt($admin)){
            //simpan last activity
            $request->session()->put('last_activity', time());

            //direct ke halaman welcome
            return redirect('/welcome');
        }else{
            //direct ke halaman login
            return redirect('/')->with('error', 'Username atau Password salah');

        }

    }

    function login(Request $request)
    {
        //validasi login
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $user = User::where('name', $request->name)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'name' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken($request->name)->plainTextToken;
    }

    function logout(Request $request)
    {   
        //remove token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
