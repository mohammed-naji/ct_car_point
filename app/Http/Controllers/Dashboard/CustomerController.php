<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index()
    {
        $customers = User::where('type', 'customer')->withCount('payments')->latest()->paginate(10);

        return view('dashboard.customers.index', compact('customers'));
    }

    function admins()
    {
        $admins = User::where('type', 'admin')->latest()->paginate(10);
        $roles = Role::all();
        return view('dashboard.customers.admins', compact('admins', 'roles'));
    }

    function admin_edit(Request $request)
    {
        User::find($request->user_id)->update([
            'role_id' => $request->role_id
        ]);
        return 'Success';
    }

    function show($id)
    {
        $customer = User::where('id', $id)->with(['payments', 'reviews'])->firstOrFail();

        return view('dashboard.customers.show', compact('customer'));
    }
}
