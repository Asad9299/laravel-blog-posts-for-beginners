@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header fw-bold">Create Post</div>
        <div class="card-body">
            <form method="post" action="{{ route('author.posts.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="category_id" class="fw-bold">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="0">Please Select</option>
                        @forelse($categories as $category)
                             <option value="{{ $category->id }}"> {{ $category->name }} </option>   
                        @empty
                        <option>No Category found</option>
                        @endforelse
                    </select>
                    @if($errors->has('category_id'))
                        <span class="fw-bold text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="title" class="fw-bold">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title..." value="{{ old('title') }}" />
                    @if($errors->has('title'))
                        <span class="fw-bold text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="content" class="fw-bold">Content</label>
                    <textarea name="content" class="form-control" id="content" placeholder="Enter content..." value="{{ old('content') }}"></textarea>
                    @if($errors->has('content'))
                        <span class="fw-bold text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" name="image" class="form-control" id="image" />
                    @if($errors->has('image'))
                        <span class="fw-bold text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="tags" class="fw-bold">Tags</label>
                    <select multiple class="form-select" id="tags" name="tags[]">
                    @forelse($tags as $tag) 
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @empty
                        <option value="-">--</option>
                    @endforelse
                </select>
                </div>





                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary fw-bold">Create</button>
                    <a href="{{ route('author.posts.index') }}" class="btn btn-secondary fw-bold">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
