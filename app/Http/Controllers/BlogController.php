<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    //
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug)
    {
        $post = Post::with(['category'])->where('slug', $slug)->first();
        return view('blog.single')->withPost($post);

    }

}
