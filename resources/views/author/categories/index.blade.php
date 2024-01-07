@extends('layouts.app')

@section('content')
<div class="container">
@include('layouts.alert-message')

<a href="{{ route('author.categories.create')}}" class="btn btn-success mb-2">Create New Category</a>
<div class="card">
        <div class="card-header fw-bold">List of Categories</div>
        <div class="card-body">
            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $category)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $category->name}}</td>
      <td>
        <div class="d-flex gap-2">
    <a href="{{ route('author.categories.edit', $category->id)}}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M11.742 0a1.5 1.5 0 0 1 1.06.44l1.5 1.5a1.5 1.5 0 0 1 0 2.12l-8.19 8.19c-.07.07-.15.13-.26.18-.1.04-.2.06-.31.06s-.21-.02-.31-.06c-.11-.05-.19-.11-.26-.18l-1.5-1.5a1.5 1.5 0 0 1 0-2.12L11.302.439a1.5 1.5 0 0 1 1.06-.44zm1.06 2.12l-1.5-1.5L14.561.44l1.5 1.5L13.808 4.25zM0 13.985V16h2.015l9.635-9.635-2.015-2.015L0 13.985z"/>
        </svg>
    </a>
    <form action="{{ route('author.categories.destroy', $category->id) }}" method="post">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
        </button>
    </form>
</div>

      </td>
    </tr>
      
    @empty
      <tr>
        <td colspan="3" class="fw-bold text-center">No Record found</td>
      </tr>
    @endforelse
  </tbody>
</table>
 <div class="d-flex">
            {{ $categories->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
