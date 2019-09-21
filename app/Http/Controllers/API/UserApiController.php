<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserApiController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => bcrypt($request->email)
        ]);

        return response()->json([
            'message' => "success",
            'status' => true
        ]);
    }
}
