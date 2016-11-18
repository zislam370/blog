@extends('main')
@section('title','|Edit Post')

@section('content')

    <div class="row">
        {!!Form:: model($post,['route'=>['posts.update',$post->id],'method'=>'PUT'])!!}
        <div class="col-md-12">

            {{Form::label('post_title','Title:')}}
            {{Form::text('post_title',null,array ('class'=>'form-control','required' => '','maxlength' => '50'))}}
            {{--{{Form::label('category','Category:')}}--}}
            {{--{{Form::text('category',null,array ('class'=>'form-control','required' => '','maxlength' => '30'))}}--}}
            {{Form::label('slug','Slug:')}}
            {{Form::text('slug',null,array ('class'=>'form-control','required' => '','minlength'=>'5','maxlength' => '225'))}}
            {{Form::label('body','Write new post:')}}
            {{Form::textarea('body',null,array ('class'=>'form-control','required' => '','maxlength' => '5000'))}}

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
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-primary')) !!}

                        </div>
                        <div class="col-sm-6">

                            {{Form::submit('Submite Post',array('class'=>'btn btn-default btn-success'))}}


                        </div>

                    </div>

                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection