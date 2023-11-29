<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
         // 認証試行
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials, $request->remember)) {
        return response()->json(['message' => 'Login successful'], 200);
    }

    // 認証失敗
    return response()->json(['message' => 'Invalid credentials'], 401);

    }
}
