@extends('dashboard.layout.app')

@section('title', 'All Blogs | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center  mb-4">
        <h1 class="h3 text-gray-800">All Blogs</h1>

        <a class="btn btn-dark px-4" href="{{ route('dashboard.blogs.create') }}">Add new Blog</a>
    </div>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td><img width="80" class="img-thumbnail" src="{{ asset('storage/' . $blog->image) }}"
                                    alt=""></td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->created_at->toDateString() }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('dashboard.blogs.edit', $blog->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('dashboard.blogs.destroy', $blog->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you Sure?!')" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
