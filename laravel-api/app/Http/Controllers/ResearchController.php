<?php

namespace App\Http\Controllers;
use App\Models\Research;
use Illuminate\Http\Request;
// use Inertia\Inertia;
// use Inertia\Response;

class ResearchController extends Controller
{
    public function index() {
        $research = Research::all();
        return Inertia::render('research', ['research' => $research]);
    }

    public function create() {
        return view('research.create');
    }

    public function store() {
        $research = Research::create([
            'title' => request('title')
        ]);
    }

    public function update(Request $request, $id) {
        $research = Research::where('id', $id)->first();
        // $request does not exist, this gives error
        $research->title = $request->input('title');
        $research->setting = $request->input('setting');
        $research->avg_video_length = $request->input('avg_video_length');
        $research->hook = $request->input('hook');
        $research->transitions = $request->input('transitions');
        $research->lighting = $request->input('lighting');
        $research->music = $request->input('music');

        $research->save();
        return dd($research);
    }

    public function delete($id) {
        $research = Research::where('id', $id)->first();
        $research->delete();

        // API Response
        // Post::destroy($id);
        // return response()->json(null, 204);

        return dd($research);
    }
}
