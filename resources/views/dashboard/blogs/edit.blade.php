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

                <div class="row">
                    <div class="col-md-6">
                        <x-input name="title_en" label="English Title" placeholder="Enter Blog English Name"
                            value="{{ $blog->title_en }}" />
                    </div>

                    <div class="col-md-6">
                        <x-input name="title_ar" label="Arabic Title" placeholder="Enter Blog Arabic Name"
                            value="{{ $blog->title_ar }}" />
                    </div>
                </div>

                <x-input type="file" name="image" label="Image" value="{{ $blog->image }}" />

                <div class="row">
                    <div class="col-md-6">
                        <x-textarea name="description_en" label="English Description"
                            placeholder="Enter Blog English Description" :value="$blog->description_en" />
                    </div>
                    <div class="col-md-6">
                        <x-textarea name="description_ar" label="Arabic Description"
                            placeholder="Enter Blog Arabic Description" :value="$blog->description_ar" />
                    </div>
                </div>

                <button class="btn btn-dark"><i class="fas fa-save"></i> Update</button>

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
