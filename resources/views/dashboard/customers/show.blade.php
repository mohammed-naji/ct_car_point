@extends('dashboard.layout.app')

@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Customer : {{ $customer->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h4>Payments</h4>
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Transaction Number</th>
                        <th>Part</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customer->payments as $payment)
                        <tr>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->part->trans_name }}</td>
                            <td>{{ $payment->price }}</td>
                            <td>{{ $payment->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h4>Reviews</h4>
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Part</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customer->reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->part->trans_name }}</td>
                            <td>{{ $review->review }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
