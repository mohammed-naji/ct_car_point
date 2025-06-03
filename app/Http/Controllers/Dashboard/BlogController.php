<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100|unique:blogs,title',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'description' => 'required|max:100',
        ]);

        // 2. store file
        $path = $request->file('image')->store('uploads', 'public');

        // 3. store in database
        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $path,
            'description' => $request->description
        ]);

        // 4. redirect with message
        return redirect()
            ->route('dashboard.blogs.index')
            ->with('msg', 'Blog added successfully')
            ->with('type', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:100|unique:blogs,title,' . $blog->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'description' => 'required|max:100',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($blog->image);
            // 2. store file
            $path = $request->file('image')->store('uploads', 'public');
        }

        // 3. store in database
        $blog->update([
            'title' => $request->title,
            'image' => $path ?? $blog->image,
            'description' => $request->description
        ]);

        // 4. redirect with message
        return redirect()
            ->route('dashboard.blogs.index')
            ->with('msg', 'Blog updated successfully')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::disk('public')->delete($blog->image);
        $blog->delete();

        return redirect()
            ->route('dashboard.blogs.index')
            ->with('msg', 'Blog deleted successfully')
            ->with('type', 'danger');
    }
}
