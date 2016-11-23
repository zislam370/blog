@extends('main')
@section('title','|Show Post')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Title:{{ $post -> post_title }} </h1>
            <h2>{{ $post -> category_id }}</h2>
            <p class="lead">{{$post -> body}}</p>
            <div class="col-md-4">


                <div class="well">

                    <dl class="dl-horizontal">
                        <label>Url</label>
                        <a href="{{url('blog/'.$post -> slug)}}">{{url('blog/'.$post -> slug)}}</a>

                    </dl>
                    <dl class="dl-horizontal">
                        <label>Ctegory</label>
                        <p>{{$post->category->name}}</p>

                    </dl>


                    <dl class="dl-horizontal">
                        <dt>Create at</dt>
                        <dd>{{date('M d, Y:i',strtotime($post -> updated_at ))}}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Updated at</dt>
                        <dd>{{date('M d, Y:i',strtotime($post -> updated_at ))}}</dd>

                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary ')) !!}

                        </div>
                        <div class="col-sm-4">
                            {!! Html::linkRoute('posts.index','See All Post',['class'=>'btn btn-primary']) !!}

                        </div>
                        <div class="col-sm-4">
                            {!!Form:: model($post,['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
                            {{Form::submit('Delete',array('class'=>'btn btn-danger btn-primary'))}}
                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>


            </div>



        </div>
        <div id="backend-comment" style="margin-top: 50px;">
            <h2>Comments
                <small>  {{$post->comments()->count()}} total</small>
            </h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comments</th>
                    <th></th>
                </tr>

                </thead>

                <tbody>
                @foreach($post->comments as $comment)

                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>
                            {!!Form:: model($comment,['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])!!}
                            {{Form::submit('Delete',array('class'=>'btn btn-danger btn-primary'))}}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection