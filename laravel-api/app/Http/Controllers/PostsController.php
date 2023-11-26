<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::all();
        return response()->json($posts);

        // FOR SETTING UP INERTIA frontend responses
        //     $data = [
        //         // Your data here
        //     ];
    
        //     return Inertia::render('ExamplePage', $data);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $post = Post::create([
            'title' => request('title')
        ]);

        // API response
        // $post = Post::create($request->all());
        // return response()->json($post, 201);
    }

    public function update(Request $request, $id) {
        // API response
        // $post = Post::find($id);
        // $post->update($request->all());
        // return response()->json($post, 200);

        $post = Post::where('id', $id)->first();
        // $request does not exist, this gives error
        $post->title = $request->input('title');
        $post->save();
        return dd($post);
    }

    public function delete($id) {
        $post = Post::where('id', $id)->first();
        $post->delete();

        // API Response
        // Post::destroy($id);
        // return response()->json(null, 204);

        return dd($post);
    }
}
