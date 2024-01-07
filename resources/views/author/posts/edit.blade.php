@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header fw-bold">Edit Post</div>
        <div class="card-body">
            <form method="post" action="{{ route('author.posts.update', $post->id)}}" enctype="multipart/form-data">
            @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title" class="fw-bold">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title..." value="{{ old('title', $post->title) }}" />
                    @if($errors->has('title'))
                        <span class="fw-bold text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="content" class="fw-bold">Content</label>
                    <textarea name="content" class="form-control" id="content" placeholder="Enter content...">{{ old('content', $post->content) }}
                    </textarea>
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

                    @if (!empty($post->image))
                        <img src="{{ $post->image }}" class="w-25 mt-2" alt="Post Image" />
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="tags" class="fw-bold">Tags</label>
                    <select multiple class="form-select" id="tags" name="tags[]">
                    @forelse($tags as $tag) 
                        <option value="{{ $tag->id }}" {{  $post->tags->contains($tag) ? 'selected' :'' }}>{{ $tag->name }}</option>
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
