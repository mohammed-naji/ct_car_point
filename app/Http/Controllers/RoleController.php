<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->paginate(10);

        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required'
        ]);

        $role = Role::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('dashboard.roles.index')
            ->with('msg', 'Role added successfully')
            ->with('type', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required'
        ]);

        $role->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('dashboard.roles.index')
            ->with('msg', 'Role updated successfully')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('dashboard.roles.index')
            ->with('msg', 'Role deleted successfully')
            ->with('type', 'info');
    }
}
