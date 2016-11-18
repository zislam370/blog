@extends('main')

@section('title','|BLOg')

@section('content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>{{$post ->post_title}}</h1>
        <p>{{$post->body}}</p>
        <hr>
        <p>Category:{{isset($post->category->name) ? $post->category->name : ''}}</p>

    </div>
</div>


    @stop