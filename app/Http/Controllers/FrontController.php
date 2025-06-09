<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    function index()
    {
        $types = Type::latest()->get();
        $parts = Part::latest()->get();

        return view('front.index', compact('types', 'parts'));
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

    function blog($id)
    {
        return view('front.blog');
    }
}
