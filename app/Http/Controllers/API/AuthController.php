<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create an access token for the user
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        $token = $user->createToken('Personal Access Token')->plainTextToken;

            return response()->json(['token' => $token, 'role' => $user->role], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function logout(Request $request)
    {
        $user = $request->user();

        // Revoke all tokens for the user
        $user->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }





   
}