@extends('dashboard.layout.app')

@section('title', 'Add New Type | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center  mb-4">
        <h1 class="h3 text-gray-800">Add new Type</h1>

        <a class="btn btn-dark px-4" href="{{ route('dashboard.types.index') }}">All Types</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input name="name" label="Name" placeholder="Enter Type Name" />

                <x-input type="file" name="image" label="Image" />

                <button class="btn btn-dark"><i class="fas fa-save"></i> Save</button>

            </form>
        </div>
    </div>
@endsection
