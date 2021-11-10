<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
