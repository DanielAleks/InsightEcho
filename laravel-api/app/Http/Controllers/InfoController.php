<?php

namespace App\Http\Controllers;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index() {
        $info = Info::all();
        return Inertia::render('info', ['info' => $info]);
    }

    public function create() {
        return view('info.create');
    }

    public function store() {
        $info = Info::create([
            'title' => request('title')
        ]);
    }

    public function update(Request $request, $id) {
        $info = Info::where('id', $id)->first();
        // $request does not exist, this gives error
        $info->title = $request->input('title');
        $info->suppliers = $request->input('suppliers');
        $info->sellingPrice = $request->input('sellingPrice');
        $info->costs = $request->input('costs');
        $info->links = $request->input('links');

        // $oldRoadBlocks = json_decode($info->roadBlocks, true) ?: []; // Decode the existing JSON to a PHP array
        // $newRoadBlock = $request->input('roadBlocks'); // Get the new road block from the form
        // $oldRoadBlocks[] = $newRoadBlock; // Add the new road block to the array
        // $info->roadBlocks = json_encode($oldRoadBlocks); // Convert the PHP array back to JSON

        $info->save();
        return dd($info);



      
    }

    public function delete($id) {
        $info = Info::where('id', $id)->first();
        $info->delete();
        return dd($info);
    }
}
