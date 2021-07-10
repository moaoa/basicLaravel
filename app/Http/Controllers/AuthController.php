<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    function login(Request $request){
        $user = User::where('email', $request->email)->first();

        // return $request->all();

        // if(!$user) return 'no user with the email: ' . $request->email;
        // if(!Hash::check($request->password, $user->password)){
        //     return 'the password is wrong';
        // }

        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => ['These credentials do not match our records']
            ], 401);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
