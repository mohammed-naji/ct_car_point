@extends('dashboard.layout.app')

@section('title', 'Payments | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Payments Details</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Customer Information</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><b>Name</b>: {{ $payment->user->name }}</li>
                        <li class="list-group-item"><b>Email:</b> {{ $payment->user->email }}</li>
                        <li class="list-group-item"><b>Orders Count:</b> {{ $payment->user->payments->count() }}</li>
                        <li class="list-group-item"><b>Orders Total:</b> ${{ $payment->user->payments->sum('price') }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Part Information</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><b>Name</b>: {{ $payment->part->trans_name }}</li>
                        <li class="list-group-item"><b>Type:</b> {{ $payment->part->type->trans_name }}</li>
                        <li class="list-group-item"><b>Price:</b> ${{ $payment->price }}</li>
                        <li class="list-group-item"><b>Status:</b> {{ Str::ucfirst($payment->status) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
