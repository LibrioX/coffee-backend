<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return response()->json([
            'success' => true,
            'data' => $blogs
        ], 200);
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return response()->json([
            'success' => true,
            'data' => $blog
        ], 200);
    }
}
