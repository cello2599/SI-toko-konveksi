<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class AuthController extends Controller
{
    

    function login(Request $request)
    {
        //validasi
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
        //removing token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
