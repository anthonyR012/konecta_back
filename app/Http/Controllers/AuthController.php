<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        
        $data = $request->validated();
        $user = User::create([
            "name"=> $data["name"],
            "email"=> $data["email"],
            "password"=> $data["password"],
            "role" => $data["role"] ?? 'customer',
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user'=> $user->only(['id','name','email','role']),
            'token' => $token,
        ],201);

    }

    public function login(LoginRequest $request){
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        
        if(!$user || !Hash::check($data['password' ], $user->password)){
            return response()->json(['message' => __('auth.invalid_credentials')], status: 422);
        }
        $user->tokens()->delete();
        $token = $user->createToken('api-token')->plainTextToken;
        
        return response()->json([
            'user'=> $user->only(['id','name','email','role']),
            'token'=> $token,
        ]);
    }


    public function me(Request $request){ 
        return response()->json($request->user()->only(['id','name','email','role']));
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=> __('validation.session_end')],201);
    }
}
