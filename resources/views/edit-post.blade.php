@extends('layouts.app')
@section('title')
Create Post
@endsection
@section('content')
<form action="{{route('posts.update',$post->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="{{$post->title}}" name="title" class="form-control" id="title" placeholder="Enter Title">

    </div>
    <div class="form-group mb-2">
        <label for="body">Body</label>
        <input type="text" value="{{$post->body}}" name="body" class="form-control" id="body"  placeholder="Enter Body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div>
    @include('layouts.error')
  </div>
@endsection
