@extends('main')
@section('title','|Blog')
@section('styles')
    {!! Html::style('css/parsley.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code image'
        });</script>

@endsection
@section('content')
    <h1> Create A new Post </h1>



    {!! Form::open(['route' => 'posts.store','data-parsley-validate' => '','files'=>true ]) !!}
    {{Form::label('post_title','Title:')}}
    {{Form::text('post_title',null,array ('class'=>'form-control','required' => '','maxlength' => '50'))}}
    {{--{{Form::label('category','Category:')}}--}}
    {{--{{Form::text('category',null,array ('class'=>'form-control','required' => '','maxlength' => '30'))}}--}}

    {{Form::label('slug','Slug:')}}
    {{Form::text('slug',null,array ('class'=>'form-control','required' => '','minlength'=>'5','maxlength' => '225'))}}

    {{Form::label('category','Category:')}}

    <select class="form-control" name="category_id">

        @foreach($category as $category)

            <option value="{{$category->id}}">{{$category->name}}</option>

        @endforeach

    </select>

    {{--image upload--}}

    {{Form::label('featured_image','Upload Image')}}
    {{Form::file('featured_image')}}

    {{Form::label('body','Write new post:')}}
    {{Form::textarea('body',null,array ('class'=>'form-control','required' => '','maxlength' => '5000'))}}
    {{Form::submit('Submit Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}

    {!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
