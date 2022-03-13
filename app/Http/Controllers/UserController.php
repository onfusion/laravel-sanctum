<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        // Validate required fields
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
        ]);

        // Create Token
        $token = $user -> createToken($request -> name) -> plainTextToken;

        // Return response
        return response ([
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
