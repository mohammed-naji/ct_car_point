@extends('dashboard.layout.app')

@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Customers</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Payments Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->email }}</td>
                            <td>{{ $c->payments_count }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('dashboard.customers.show', $c->id) }}"><i
                                        class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $customers->links() }}
        </div>
    </div>
@endsection
