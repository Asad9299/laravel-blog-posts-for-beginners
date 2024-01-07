<?php

namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;

use App\Http\Requests\Category\AddCategory;
use App\Http\Requests\Category\UpdateCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = new Category();
        $categories = $categories->list(true);
        return view('author.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategory $request)
    {
        $category = new Category();
        if($category->add($request->validated())) {
            return to_route('author.categories.index')->with('success', 'The Category has been Created Successfully');
        } 
            return to_route('author.categories.create')->with('error', 'Something went wrong');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('author.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        if($category->edit($request->validated())) {
            return to_route('author.categories.index')->with('success', 'Category has been updated successfully');
        }
        return to_route('author.categories.edit')->with('error', 'Something went wrong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->remove()) {
            return to_route('author.categories.index')->with('success', 'Category has been deleted successfully');
        } 
        return to_route('author.categories.index')->with('error', 'Something went wrong');
    }
}
