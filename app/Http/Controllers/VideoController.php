<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoStoreeRequest;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    //
    public function index(Request $request)
    {
        if(auth()->user()->type == 'A') {
            $data = Videos::latest()->take(3)->get();
        } elseif(auth()->user()->type == 'B') {
            $data = Videos::latest()->take(10)->get();
        } else {
            $data = Videos::latest()->get();
        }

        return view('pages.videos.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('pages.videos.create');
    }

    public function store(VideoStoreeRequest $request)
    {
        $data = $request->all();
        Videos::create($data);
        return redirect()->route('videos.index')->with('success', 'Video created successfully');
    }

    public function edit(Request $request, $id)
    {
        $video = Videos::findOrFail($id);
        return view('pages.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $data = Videos::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('videos.index')->with('success', 'Video updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $data = Videos::findOrFail($id);
        $data->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully');
    }
}
