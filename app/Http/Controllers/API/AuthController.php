<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if user object is returned
        Log::info('Authenticated User:', ['user' => $user]);

        // Attempt to create a token
        try {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            Log::info('Token created:', ['token' => $token]);

            $role = $user->getRoleNames()->first(); 

            return response()->json(['token' => $token, 'role' => $role], 200);
        } catch (\Exception $e) {
            Log::error('Error creating token:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Token creation failed'], 500);
        }
    }

    Log::warning('Unauthorized login attempt:', ['credentials' => $credentials]);

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