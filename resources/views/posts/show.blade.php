@extends('main')
@section('title','|Show Post')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Title:{{ $post -> post_title }} </h1>
            <h2>{{ $post -> category }}</h2>
            <p class="lead">{{$post -> body}}</p>
            <div class="col-md-4">
                <div class="well">
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
    </div>
@endsection