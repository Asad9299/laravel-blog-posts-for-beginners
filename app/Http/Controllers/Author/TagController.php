<?php

namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;

use App\Http\Requests\Tag\AddTag;
use App\Http\Requests\Tag\UpdateTag;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = new Tag();
        $tags = $tags->list();
        return view('author.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTag $request)
    {
        $tag = new Tag();
        if($tag->add($request->validated())) {
            return to_route('author.tags.index')->with('success', 'The Tag has been Created Successfully');
        } 
        return to_route('author.tags.create')->with('error', 'Something went wrong');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('author.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTag $request, Tag $tag)
    {
        
        if($tag->edit($request->validated())) {
            return to_route('author.tags.index')->with('success', 'Tag has been updated successfully');
        }
        return to_route('author.tags.edit')->with('error', 'Something went wrong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->remove()) {
            $tag->post()->detach();
            return to_route('author.tags.index')->with('success', 'Tag has been deleted successfully');
        } 
        return to_route('author.tags.index')->with('error', 'Something went wrong');
    }
}