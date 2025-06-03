@extends('dashboard.layout.app')

@section('title', 'Edit Blog | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center  mb-4">
        <h1 class="h3 text-gray-800">Edit Blog</h1>

        <a class="btn btn-dark px-4" href="{{ route('dashboard.blogs.index') }}">All Blogs</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <x-input name="title" label="Title" placeholder="Enter Blog Name" value="{{ $blog->title }}" />

                <x-input type="file" name="image" label="Image" value="{{ $blog->image }}" />

                <x-textarea name="description" label="Description" placeholder="Enter Blog Description"
                    value="{{ $blog->description }}" />

                <button class="btn btn-dark"><i class="fas fa-save"></i> Update</button>

            </form>
        </div>
    </div>
@endsection
