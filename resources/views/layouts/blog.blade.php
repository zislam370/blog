@extends('main')
@section('title','|Blog')
@section('content')
    <h1> Create A new Post </h1>
    <form>
        <div class="form-group">
            <label for="email">Title:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Tag:</label>
            <input type="password" class="form-control" id="pwd">
        </div>



        <div class = "form-group">
            <label for = "name">Write Your Blog</label>
            <textarea class = "form-control" rows = "3"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>

    </form>
@endsection

