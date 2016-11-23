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



    {{--post comments--}}

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            {{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}

            <div class="row">
                <div class="col-sm-6">

                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}

                </div>

                <div class="col-sm-6">

                    {{Form::label('email','E-mail:')}}
                    {{Form::text('email',null,['class'=>'form-control'])}}

                </div>

                <div class="col-sm-12">

                    {{Form::label('comment','Comment:')}}
                    {{Form::textarea('comment',null,['class'=>'form-control','rows'=>'5'])}}
                    {{Form::submit('Add Comment',['class'=>'btn btn-success btn-block', 'style'=>'margin-top:10px;'])}}
                </div>
            </div>


            {{Form::close()}}
        </div>
    </div>

    {{--///// comment--}}


    <div class="row">
        <div class="col-sm-8 col-md-offset-2 ">
            <h2 class="comment-title "><span class="glyphicon glyphicon-comment"></span>{{$post->comments()->count()}} Comments</h2>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))}}" class="author-img">
                        <div class="author-name">
                            <h4>{{$comment->name}}</h4>
                            <p class="author-time">
                                {{$comment->created_at}}
                            </p>
                        </div>
                    </div>

                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>


                </div>
            @endforeach
        </div>
    </div>


@endsection