@extends('main')

@section('title','| All categories')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>

                        <td> {!!Form:: model($category,['route'=>['categories.destroy',$category->id],'method'=>'DELETE'])!!}
                            {{Form::submit('Delete',array('class'=>'btn btn-danger btn-primary'))}}
                            {!! Form::close() !!}
                        </td>
                        <td> {!! Html::linkRoute('categories.edit','Edit',array($category->id),array('class'=>'btn btn-primary ')) !!} </td>
                    </tr>
                @endforeach
                </tbody>


            </table>

        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form:: open(['route' => 'categories.store','method'=>'POST'])!!}

                <h1>New Categories</h1>
                {{ Form::label('name','Name:') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}

                {{Form::submit('Create new Category',['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
                {!!Form::close() !!}

            </div>

        </div>


    </div>


@endsection
