<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->get(); 
        return response()->json([
            'status' => 200,
            'data' => $posts,
            'message' => 'Barcha postlar muvaffaqiyatli olindi'
        ]);
    }


    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
    
        return response()->json([
            'status' => 201,
            'data' => $post,
            'message' => 'Post muvaffaqiyatli yaratildi'
        ], 201);
    }

    public function show(string $id)
    {
        //
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
    
        return response()->json([
            'status' => 200,
            'data' => $post,
            'message' => 'Post muvaffaqiyatli yangilandi'
        ]);
    }


    public function destroy(Post $post)
    {
        $post->delete();
    
        return response()->json([
            'status' => 200,
            'message' => 'Post muvaffaqiyatli ocirildi'
        ]);
    }
}
