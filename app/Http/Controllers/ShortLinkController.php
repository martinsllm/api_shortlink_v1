<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

    public function show($shortlink)
    {
        $result = Cache::remember($shortlink, 60, function () use ($shortlink) {
            return ShortLink::where('name', $shortlink)->firstOrFail();
        });

        return redirect($result->url);
    }
}
