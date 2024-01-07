<?php

namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;

use App\Http\Requests\Post\AddPost;
use App\Http\Requests\Post\UpdatePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = new Post();
        $posts = $posts->list();
        return view('author.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = new Tag();
        $tags = $tags->list();

        $categories = new Category();
        $categories = $categories->list();

        return view('author.posts.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPost $request)
    {
        $post = new Post();
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        if($request->has('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('posts/', time().'_'.$fileName, 'public');
            $data['image'] = time().'_'.$fileName;
        }
        $postSaved = $post->add($data);
        if($postSaved) {
            $post = Post::findOrFail($postSaved->id);
            $post->tags()->sync($request->tags);
            return to_route('author.posts.index')->with('success', 'The Post has been Created Successfully');
        } 
        return to_route('author.posts.create')->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {   
       $tags = collect($post->tags)->map(function($tag) {
            return $tag->name;
       });

       if(!empty($tags)) {
        $tags = implode('#',$tags->toArray());
       }
       return view('author.posts.show', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $tags = new Tag();
        $tags = $tags->list();
        return view('author.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, post $post)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        if($request->has('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('posts/', time().'_'.$fileName, 'public');
            $data['image'] = time().'_'.$fileName;
        }
        $postUpdated = $post->edit($data);
        if($postUpdated) {
            $post->tags()->sync($request->tags);
            return to_route('author.posts.index')->with('success', 'The Post has been Updated Successfully');
        } 
        return to_route('author.posts.edit')->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->remove()) {
            $post->tags()->detach();
            return to_route('author.posts.index')->with('success', 'Post has been deleted successfully');
        } 
        return to_route('author.posts.index')->with('error', 'Something went wrong');    
    }
}
