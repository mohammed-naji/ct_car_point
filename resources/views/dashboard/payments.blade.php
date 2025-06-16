@extends('dashboard.layout.app')

@section('title', 'Payments | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Payments</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Part</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->part->trans_name }}</td>
                            <td>${{ $payment->price }}</td>
                            <td>
                                @php
                                    $class = 'success';
                                    if ($payment->status == 'cancel') {
                                        $class = 'danger';
                                    } elseif ($payment->status == 'pending') {
                                        $class = 'warning';
                                    } elseif ($payment->status == 'refunded') {
                                        $class = 'dark';
                                    }
                                @endphp
                                <span class="badge badge-{{ $class }}">{{ Str::ucfirst($payment->status) }}</span>
                            </td>
                            <td>{{ $payment->created_at->toDateString() }}</td>
                            <td>
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('dashboard.payments_details', $payment->id) }}"><i
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
            {{ $payments->links() }}
        </div>
    </div>
@endsection
