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

                <div class="row">
                    <div class="col-md-6">
                        <x-input name="title_en" label="English Title" placeholder="Enter Blog English Title" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="title_ar" label="Arabic Title" placeholder="Enter Blog Arabic Title" />
                    </div>
                </div>

                <x-input type="file" name="image" label="Image" />

                <div class="row">
                    <div class="col-md-6">
                        <x-textarea name="description_en" label="English Description"
                            placeholder="Enter Blog English Description" />
                    </div>
                    <div class="col-md-6">
                        <x-textarea name="description_ar" label="Arabic Description"
                            placeholder="Enter Blog Arabic Description" />
                    </div>
                </div>

                <button class="btn btn-dark"><i class="fas fa-save"></i> Save</button>

            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
        });
    </script>
@endsection
