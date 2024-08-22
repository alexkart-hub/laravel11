<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogCategory;
use App\Models\BlogPost;

class PostController extends BaseController
{
    public function index(string $category, string $post)
    {
        $post = BlogPost::where('slug', $post)->first();
        $category = BlogCategory::where('slug', $category)->first();
        return view('post', ['category' => $category, 'post' => $post]);
    }
}
