<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartRequest;
use App\Models\Part;
use App\Models\Type;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::latest()->paginate(10);

        return view('dashboard.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::select('id', 'name')->get();

        return view('dashboard.parts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartRequest $request)
    {
        $path = $request->file('image')->store('uploads', 'public');

        Part::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'image' => $path,
            'price' => $request->price,
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'type_id' => $request->type_id
        ]);

        return redirect()
            ->route('dashboard.parts.index')
            ->with('msg', 'Part added successfully')
            ->with('type', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Part $part)
    {
        $types = Type::select('id', 'name')->get();

        return view('dashboard.parts.edit', compact('types', 'part'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
