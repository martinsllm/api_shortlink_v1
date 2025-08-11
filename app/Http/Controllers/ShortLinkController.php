<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30|alpha|unique:short_links',
            'url' => 'required|url'
        ]);

        $result = ShortLink::create($request->all());

        return response()->json($result, 201);
    }

    public function show()
    {

    }
}
