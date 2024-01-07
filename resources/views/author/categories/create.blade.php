@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header fw-bold">Create Category</div>
        <div class="card-body">
            <form method="post" action="{{ route('author.categories.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name..." value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="fw-bold text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary fw-bold">Create</button>
                    <a href="{{ route('author.categories.index') }}" class="btn btn-secondary fw-bold">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
