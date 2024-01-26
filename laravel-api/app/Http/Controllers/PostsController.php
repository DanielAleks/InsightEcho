<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostsController extends Controller
{

    // public function show(string $id): Response
    // {
    //     return Inertia::render('Users/Profile', [
    //         'user' => User::findOrFail($id)
    //     ]);
    // }

    public function index() {
        $posts = Post::all();
        // return response()->json($posts);

        // 'Posts/Index'
        return Inertia::render('posts', ['posts' => $posts]);

            // or do
        // return inertia(component: 'Posts/Index', compact( var_name: 'posts' ))


        // FOR SETTING UP INERTIA frontend responses
        //     $data = [
        //         // Your data here
        //     ];
    
        //     return Inertia::render('ExamplePage', $data);
    }

    public function create() {
        // return view('posts.create');
        return Inertia::render('posts.create');
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
        $post->setting = $request->input('setting');
        $post->avg_video_length = $request->input('avg_video_length');
        $post->hook = $request->input('hook');
        $post->transitions = $request->input('transitions');
        $post->lighting = $request->input('lighting');
        $post->music = $request->input('music');

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
