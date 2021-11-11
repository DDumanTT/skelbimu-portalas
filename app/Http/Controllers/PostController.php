<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
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
            'images.*' => 'nullable|image',
        ]);


        $post_id = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ])->id;

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $path = $image->store('images');
                Image::create(['filepath' => $path, 'post_id' => $post_id]);
            }
        }

        return redirect(RouteServiceProvider::HOME);
    }

    public function delete(Request $request, Post $post)
    {
        $post->delete();
        return redirect(RouteServiceProvider::HOME);
    }
}
