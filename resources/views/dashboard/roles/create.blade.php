@extends('dashboard.layout.app')

@section('title', 'Add New Role | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center  mb-4">
        <h1 class="h3 text-gray-800">Add new Role</h1>

        <a class="btn btn-dark px-4" href="{{ route('dashboard.roles.index') }}">All Roles</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.roles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <x-input name="name_en" label="English Name" placeholder="Enter Role Name" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="name_ar" label="Arabic Name" placeholder="Enter Role Name" />
                    </div>
                </div>

                <label>Permissions</label> <br>

                <ul class="list-unstyled" style="column-count: 2">
                    @foreach ($permissions as $per)
                        <li><label><input type="checkbox" name="permissions[]" value="{{ $per->id }}">
                                {{ $per->trans_name }}</label></li>
                    @endforeach

                </ul>

                <button class="btn btn-dark"><i class="fas fa-save"></i> Save</button>

            </form>
        </div>
    </div>
@endsection
