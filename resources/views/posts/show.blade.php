@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ $post->title }}
                        <a href="{{ route('posts.index') }}" class="ms-auto btn btn-success">Back to List</a>
                    </div>

                    <div class="card-body">
                        @if($post->image)
                            <img src="{{ $post->image }}" class="w-50">
                        @endif

                        <div class="mt-2">{!! $post->content !!}</div>

                        <div class="mt-2">
                            @if($tags)
                                <a href="javascript:void(0)" class="btn btn-outline-secondary">#{{ $tags }}</a>
                                @else
                                No Tags attached to the post.
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        Last Updated {{ $post->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
