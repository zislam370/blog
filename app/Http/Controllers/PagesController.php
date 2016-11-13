<?php
/**
 * Created by PhpStorm.
 * User: Zahid
 * Date: 30-Oct-16
 * Time: 10:22 AM
 */

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {


    public function getIndex(){

        $posts = Post::orderBy('created_at','desc')-> limit(3)-> get();

        return view("layouts.welcome")->withPosts($posts);

    }

    public function getBlog(){

        return view("posts.index");

    }


}