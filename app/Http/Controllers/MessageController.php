<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required', 'string'],
        ]);

        Message::create([
            'text' => $request->text,
            'date' => date("Y-m-d h:i:s"),
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
        ]);

        return redirect("/post/$request->post_id");
    }
}
