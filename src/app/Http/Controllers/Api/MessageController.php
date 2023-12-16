<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:1000',
        ]);

        $message = Message::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return response()->json($message, 201);
    }
}
