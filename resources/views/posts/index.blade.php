@extends('main')

@section('title','|All Post')

@section('content')

    <div class="row">

        <div class="col-sm-10">

            <h1>All Post</h1>
        </div>

        <div class="col-sm-2">

            <a href="{{route('posts.create')}}" class=" btn btn-lg btn-block btn-primary btn-h1-spece{">New Post</a>

        </div>
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

            <table class="table">
                <thead>

                <th></th>
                <th>Title</th>
                <th>Category</th>
                <th>Body</th>
                <th>Created at</th>
                <th></th>


                </thead>
                <tbody>
                @foreach($posts as $post)

                    <tr>
                        <th>{{$post->id}}</th>
                        <th>{{$post->post_title}}</th>
                        <th>{{$post->category_id}}</th>
                        <th>{{substr($post->body,0,50)}}{{strlen($post->body)>50? "...":''}}</th>
                        <th>{{$post->created_at}}</th>
                        <th><a href="{{route('posts.show',$post ->id)}}" class="btn btn-default">View</a> <a href="{{route('posts.edit',$post -> id)}}"class="btn btn-default">Edit</a> </th>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {!! $posts -> links() !!}
            </div>

        </div>


    </div>

@endsection