@extends('layouts.app')
@section('title')
Post
@endsection
@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">
        {{$post->body}}
      </p>
      <a class="card-link">Created_At : {{$post->created_at}}</a>
      <sapn>Author: {{$post->user->name}}</sapn>
      <a href="{{route('posts.index')}}" class="card-link">Home</a>
    </div>
  </div>
@endsection

