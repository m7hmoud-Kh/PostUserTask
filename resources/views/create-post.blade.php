@extends('layouts.app')
@section('title')
Create Post
@endsection
@section('content')
<form action="{{route('posts.store')}}" method="POST">
    @csrf
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">

    </div>
    <div class="form-group mb-2">
        <label for="body">Body</label>
        <input type="text" name="body" class="form-control" id="body"  placeholder="Enter Body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div>
    @include('layouts.error')
  </div>

@endsection
