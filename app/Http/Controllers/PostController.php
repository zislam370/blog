<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'post_title' => 'required|max:200',
            'category' => 'required|max:200',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required|max:5000',
        ));
        $post = new Post();
        $post->post_title = $request->post_title;
        $post->category = $request->category;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();

        Session::flash('success', 'Blog post successfully');

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'post_title' => 'required|max:30',
                'category' => 'required|max:30',
                'body' => 'required|max:5000',
            ));

        } else {
            $this->validate($request, array(
                'post_title' => 'required|max:30',
                'category' => 'required|max:30',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required|max:5000',
            ));

        }


        $post = Post::find($id);
        $post->post_title = $request->input('post_title');
        $post->category = $request->input('category');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();

        Session::flash('success', 'Blog Edit successfully');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post delete successfully');

        return redirect()->route('posts.index');
    }
}
