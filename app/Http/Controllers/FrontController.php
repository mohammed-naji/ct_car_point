<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Part;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    function index()
    {
        $types = Type::latest()->get();
        $parts = Part::latest()->get();
        $blogs = Blog::latest()->get();

        return view('front.index', compact('types', 'parts', 'blogs'));
    }

    function type(Type $type)
    {
        return view('front.type', compact('type'));
    }

    function part(Part $part)
    {
        // $related = Type::where('id', $part->id);
        $related = Part::where('type_id', $part->type_id)
            ->where('id', '!=', $part->id)
            ->get();

        return view('front.part', compact('part', 'related'));
    }

    function blog(Blog $blog)
    {
        // $blog = Blog::where('slug', $slug)->first();
        return view('front.blog', compact('blog'));
    }

    function search(Request $request)
    {
        $local = App::getLocale();
        $parts = Part::where("name->$local", 'like', '%' . $request->q . '%')
            ->orWhere("description->$local", 'like', '%' . $request->q . '%')
            ->get();

        return view('front.search', compact('parts'));
    }

    function blogs()
    {
        $blogs = Http::get('https://dummyjson.com/posts?limit=12')->json();
        // dd($blogs['posts']);
        return view('front.blogs', compact('blogs'));
    }
}
