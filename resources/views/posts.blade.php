@extends('layouts.app')
@section('title')
All posts
@endsection
@section('content')
<a  href="{{route('posts.create')}}" class="btn btn-primary mb-3 mt-3">Add Post</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">body</th>
        <th scope="col">Author</th>
        <th scope="col">Created At</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at}}</td>
        <td>
            <a href="{{route('posts.show',$post->id)}}" class="btn btn-success">View</a>
        </td>
        <td>
            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
        </td>
        <td>
            <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $posts->onEachSide(5)->links() }}
@endsection
