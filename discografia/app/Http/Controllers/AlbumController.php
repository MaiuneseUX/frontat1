<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('tracks')->get();
        return view('welcome', compact('albums'));
    }

    public function show(Album $album)
    {
        $album->load('tracks');
        return view('album.show', compact('album'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $albums = Album::where('name', 'like', "%$query%")->with('tracks')->get();
        return view('welcome', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'release_year' => 'required|integer'
        ]);

        $album = Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Álbum criado com sucesso!');
    }

    public function addTrack(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|string'
        ]);

        $track = new Track($request->all());
        $album->tracks()->save($track);

        return redirect()->route('albums.show', $album->id)->with('success', 'Faixa adicionada com sucesso!');
    }

    public function destroyTrack(Track $track)
    {
        $track->delete();
        return redirect()->back()->with('success', 'Faixa excluída com sucesso!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Álbum excluído com sucesso!');
    }
}
