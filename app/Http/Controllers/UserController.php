<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // User Registration
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

    // User Logout
    public function logout() {
        auth() -> user() -> tokens() -> delete();
        return response([
            'message' => 'Successfully Logged out...'
        ]);
    }

    // User Login
    public function login(Request $request) {
        // Validate required fields
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find in the DB using where method
        $user = User::where('email', $request -> email) -> first();

        // Condition to verify $user
        if(!$user || !Hash::check($request -> password, $user -> password)) {
            return response([
                'message' => 'Given credentials are incorrect...',
            ], 401);
        }

        // Create Token
        $token = $user -> createToken('mytoken') -> plainTextToken;

        // Return response
        return response ([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
