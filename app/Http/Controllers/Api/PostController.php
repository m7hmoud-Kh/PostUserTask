<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Response;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->latest()->paginate();
        return response()->json([
            'Message' => 'Ok',
            'posts' => PostResource::collection($posts)
        ]);
    }


    public function store(StorePostRequest $request)
    {
        $post = Post::create(array_merge($request->validated(),['user_id' => Auth::user()->id]));
        return response()->json([
            'Message' => 'Created',
            'post' => new PostResource($post)
        ],Response::HTTP_CREATED);
    }


    public function show($id)
    {
        $post = Post::whereId($id)->first();
        if($post){
            return response()->json([
                'Message' => 'Ok',
                'post' => new PostResource($post)
            ]);
        }
        return response()->json([
            'message' => 'Not Found'
        ],Response::HTTP_BAD_REQUEST);

    }

    public function update(StorePostRequest $request, $id)
    {
        $post = Post::whereId($id)->where('user_id',Auth::user()->id)->first();
        if($post){
            $post->update(array_merge(
                $request->validated(),
                ['user_id' => Auth::user()->id]
            ));

            return response()->json([
                'Message' => 'Updated',
                'post' => new PostResource($post)
            ],Response::HTTP_ACCEPTED);
        }
        return response()->json([
            'message' => 'Not Found'
        ],Response::HTTP_BAD_REQUEST);
    }

    public function destroy($id)
    {
        $post = Post::whereId($id)->where('user_id',Auth::user()->id)->first();
        if($post){
            $post->delete();
            return response()->json([],Response::HTTP_NO_CONTENT);
        }
        return response()->json([
            'message' => 'Not Found'
        ],Response::HTTP_BAD_REQUEST);

    }
}
