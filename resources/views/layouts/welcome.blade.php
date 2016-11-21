
@extends('main')
@section('title','|Homepage')
@section('content')
    @include('partials._slider')

    <h3>Recent Post</h3><br>
    <div class="row">

        @foreach($posts as $post)



        <div class="col-sm-4">

            <div class="box">
            <h2>{{$post -> post_title}}</h2>
            <h3>{{$post -> category->name}} </h3>
            <p>{{substr($post->body,0,50)}}{{strlen($post->body)>50? "...":''}} </p>
                <a href="{{route('blog.single',$post ->slug)}}" class="btn bg-primary">Read more</a>

        </div>
        </div>

        @endforeach


    </div>




 @endsection

