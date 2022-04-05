<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (Request $request) {
        $this->validateLogin($request);

        //Login True
        if (Auth::attempt($request->only('email', 'password'))) {
            # code...
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Success'
            ]);
        }

        //Login False
        return response()->json([
            'message' => 'unauthorized'
        ], 401);
    }

    public function validateLogin (Request $request) {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
    }
}
