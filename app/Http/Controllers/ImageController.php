<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function delete(Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $image->delete();
            }
        }
        return back();
    }
}
