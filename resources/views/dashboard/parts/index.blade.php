@extends('dashboard.layout.app')

@section('title', 'All Parts | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center  mb-4">
        <h1 class="h3 text-gray-800">All Parts</h1>

        <a class="btn btn-dark px-4" href="{{ route('dashboard.parts.create') }}">Add new Part</a>
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($parts as $part)
                        <tr>
                            <td>{{ $part->id }}</td>
                            <td><img width="80" class="img-thumbnail" src="{{ asset('storage/' . $part->image) }}"
                                    alt=""></td>
                            <td>{{ $part->trans_name }}</td>
                            <td>{{ $part->price }}</td>
                            <td>{{ $part->type->trans_name }}</td>
                            <td>{{ $part->created_at->toDateString() }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('dashboard.parts.edit', $part->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('dashboard.parts.destroy', $part->id) }}"
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
                            <td colspan="7" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $parts->links() }}
        </div>
    </div>
@endsection
