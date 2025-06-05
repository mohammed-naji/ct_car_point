<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index()
    {
        $customers = User::where('role', 'customer')->withCount('payments')->latest()->paginate(10);

        return view('dashboard.customers.index', compact('customers'));
    }

    function show($id)
    {
        $customer = User::where('id', $id)->with(['payments', 'reviews'])->firstOrFail();

        return view('dashboard.customers.show', compact('customer'));
    }
}
