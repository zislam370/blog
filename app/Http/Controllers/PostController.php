<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Intervention\Image\Facades\Image as Image;
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

        $categories = Category::all();

        return view('posts.index')->withPosts($posts)->withCategory($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('posts.create')->withCategory($category);

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
            'category_id' => 'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required|max:5000',
        ));
        $post = new Post();
        $post->post_title = $request->post_title;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->body = $request->body;

        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,500)->save($location);
            $post->image = $filename;
        }


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
        $categories = Category::all();
        $cats = array();

        foreach ($categories as $category) {
            $cats [$category->id] = $category->name;

        }


        return view('posts.edit')->withPost($post)->withCategories($cats);


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
                'category_id' => 'required|integer',
                'body' => 'required|max:5000',
            ));

        } else {
            $this->validate($request, array(
                'post_title' => 'required|max:30',
                'category_id' => 'required|integer',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required|max:5000',
            ));

        }


        $post = Post::find($id);
        $post->post_title = $request->input('post_title');
        $post->category_id = $request->input('category_id');
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
