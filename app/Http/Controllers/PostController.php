<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('tags','category')->paginate(1);
        return view('posts.index', compact('posts'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::with('tags', 'category')->findOrFail($post->id);
        $tags = collect($post->tags)->map(function($tag) {
            return $tag->name;
       });

       if(!empty($tags)) {
        $tags = implode('#',$tags->toArray());
       }
        return view('posts.show', compact('post', 'tags'));
    }

   
}
