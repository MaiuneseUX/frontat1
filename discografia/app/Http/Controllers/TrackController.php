<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function store(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|string'
        ]);

        $track = new Track($request->all());
        $album->tracks()->save($track);

        return response()->json($track, 201);
    }

    public function destroy(Track $track)
    {
        $track->delete();
        return response()->json(null, 204);
    }
}
