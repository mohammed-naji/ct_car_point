@extends('dashboard.layout.app')

@section('title', 'Add New Blog | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center  mb-4">
        <h1 class="h3 text-gray-800">Add new Blog</h1>

        <a class="btn btn-dark px-4" href="{{ route('dashboard.blogs.index') }}">All Blogs</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input name="title" label="Title" placeholder="Enter Blog Title" />

                <x-input type="file" name="image" label="Image" />

                <x-textarea name="description" label="Description" placeholder="Enter Blog Description" />

                <button class="btn btn-dark"><i class="fas fa-save"></i> Save</button>

            </form>
        </div>
    </div>
@endsection
