@extends('main')
@section('title','|Edit Post')

@section('content')

    <div class="row">
        {!!Form:: model($category,['route'=>['categories.update',$category->id],'method'=>'PUT'])!!}
        <div class="col-md-12">

            {{Form::label('name','Name:')}}
            {{Form::text('name',null,array ('class'=>'form-control','required' => '','maxlength' => '50'))}}


            <div class="well">

                        {{Form::submit('Edit',array('class'=>'btn btn-default btn-success'))}}

            </div>

        </div>

        {!! Form::close() !!}
    </div>

@endsection