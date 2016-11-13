@extends('main')
@section('title','|Blog')
@section('styles')
{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <h1> Create A new Post </h1>

    {!! Form::open(['route' => 'posts.store','data-parsley-validate' => '' ]) !!}
       {{Form::label('post_title','Title:')}}
       {{Form::text('post_title',null,array ('class'=>'form-control','required' => '','maxlength' => '50'))}}
       {{Form::label('category','Category:')}}
       {{Form::text('category',null,array ('class'=>'form-control','required' => '','maxlength' => '30'))}}
       {{Form::label('body','Write new post:')}}
       {{Form::textarea('body',null,array ('class'=>'form-control','required' => '','maxlength' => '5000'))}}
       {{Form::submit('Submit Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}

    {!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    @endsection
