<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartRequest;
use App\Http\Resources\PartResource;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::latest()->get();
        // return $parts;
        return response()->json(PartResource::collection($parts), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartRequest $request)
    {
        $path = $request->file('image')->store('uploads', 'public');

        $part = Part::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'image' => $path,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'type_id' => $request->type_id
        ]);

        return response()->json(new PartResource($part), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        return response()->json(new PartResource($part), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Part $part)
    {
        // return $request->all();

        $path = $part->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }

        $part->update([
            'name' => [
                'en' => $request->name_en ?? $part->name_en,
                'ar' => $request->name_ar ?? $part->name_ar,
            ],
            'image' => $path,
            'price' => $request->price ?? $part->price,
            'sale_price' => $request->sale_price ?? $part->sale_price,
            'description' => [
                'en' => $request->description_en ?? $part->description_en,
                'ar' => $request->description_ar ?? $part->description_ar,
            ],
            'type_id' => $request->type_id ?? $part->type_id
        ]);

        return response()->json(new PartResource($part), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $part = Part::find($id);

        if (!$part) {
            return response()->json([
                'msg' => 'Part Not Found'
            ], 404);
        }

        $part->delete();
        return "Part Deleted";
    }
}
