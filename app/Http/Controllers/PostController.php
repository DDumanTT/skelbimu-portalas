<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Intervention\Image\ImageManagerStatic as Img;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $visited = session('visited_posts', []);
        if (!in_array($id, $visited)) {
            session(['visited_posts' => [...$visited, $id]]);
            $post->views++;
            $post->save();
        }
        return view('post', ['post' => $post, 'messages' => $post->messages()->orderBy('created_at', 'DESC')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'images' => 'array|between:0,5',
            'images.*' => 'nullable|image',
        ]);

        $post_id = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'user_id' => Auth::id(),
        ])->id;

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $path = Str::random(20) . $image->getClientOriginalName();
                $img = Img::make($image);
                $img->resize(320, 240, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->insert(public_path('/watermark.png'));
                $img->save(storage_path('app/public/images/' . $path));
                Image::create(['filepath' => "images/" . $path, 'post_id' => $post_id]);
            }
        }

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'images' => "array|between:0," . (5 - $post->images->count() + (!$request->del_images ? 0 : count($request->del_images))),
            'images.*' => 'nullable|image',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->price = $request->price;
        $post->save();

        if ($request->del_images) {
            foreach ($request->del_images as $id) {
                Image::find($id)->delete();
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $path = Str::random(20) . $image->getClientOriginalName();
                $img = Img::make($image);
                $img->resize(320, 240, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->insert(public_path('/watermark.png'));
                $img->save(storage_path('app/public/images/' . $path));
                Image::create(['filepath' => "images/" . $path, 'post_id' => $post->id]);
            }
        }

        return redirect("/post/" . $post->id);
    }

    public function delete(Request $request, Post $post)
    {
        $post->delete();
        return redirect(RouteServiceProvider::HOME);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::query()->where('title', 'LIKE', "%{$search}%")->orWhere('body', 'LIKE', "%{$search}%")->get();

        return view('dashboard', ['posts' => $posts]);
    }
}
