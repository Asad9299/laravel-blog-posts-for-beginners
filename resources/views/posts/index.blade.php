@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="{{ route('posts.show', $post) }}">
                    @if($post->image)
                    <img src="{{ $post->image }}" class="card-img-top" alt="Post Image">
                    @else
                    <img src="{{ asset('no_image.jpg') }}" class="card-img-top" alt="No Image">
                    @endif
                </a>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        <div class="">
                            <span class="font-weight-bolder text-info">{{ $post->category->name }}</span>
                        </div>
                    </div>
                    <a href="{{ route('posts.show', $post) }}" class="text-success text-decoration-none">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </a>
                    <p class="card-text text-muted">{{ $post->content }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <p class="text-center">No Posts to show yet!</p>
        </div>
        @endforelse
    </div>
     <div class="d-flex">
            {{ $posts->links() }}
        </div>
</div>
@endsection
