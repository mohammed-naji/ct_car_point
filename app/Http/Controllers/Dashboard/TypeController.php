<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::latest()->paginate(10);

        return view('dashboard.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg'
        ]);

        // 2. store file
        $path = $request->file('image')->store('uploads', 'public');

        // 3. store in database
        Type::create([
            'name' => $request->name,
            'image' => $path
        ]);

        // 4. redirect with message
        return redirect()
            ->route('dashboard.types.index')
            ->with('msg', 'Type added successfully')
            ->with('type', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('dashboard.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($type->image);
            // 2. store file
            $path = $request->file('image')->store('uploads', 'public');
        }

        // 3. store in database
        $type->update([
            'name' => $request->name,
            'image' => $path ?? $type->image
        ]);

        // 4. redirect with message
        return redirect()
            ->route('dashboard.types.index')
            ->with('msg', 'Type updated successfully')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        Storage::disk('public')->delete($type->image);
        $type->delete();

        return redirect()
            ->route('dashboard.types.index')
            ->with('msg', 'Type deleted successfully')
            ->with('type', 'danger');
    }
}
