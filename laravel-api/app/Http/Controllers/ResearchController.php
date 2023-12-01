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
        $research->targetMarket = $request->input('targetMarket');
        $research->avatar = $request->input('avatar');
        $research->currentState = $request->input('currentState');
        $research->dreamState = $request->input('dreamState');
        // $research->roadBlocks = $request->input('roadBlocks');
        $research->solution = $request->input('solution');
        $research->product = $request->input('product');

        $oldRoadBlocks = json_decode($research->roadBlocks, true) ?: []; // Decode the existing JSON to a PHP array
        $newRoadBlock = $request->input('roadBlocks'); // Get the new road block from the form
        $oldRoadBlocks[] = $newRoadBlock; // Add the new road block to the array
        $research->roadBlocks = json_encode($oldRoadBlocks); // Convert the PHP array back to JSON

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
