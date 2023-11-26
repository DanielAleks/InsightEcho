<?php

public function store(Request $request): \Illuminate\Http\JsonResponse
{
    $data = Todo::where('user_id', $request->user()->id)->where('title', $request->title);
    if ($data->first()) {
        return response()->json(['status' => false, 'message' => 'Already exist']);
    }
    $req = $request->all();
    $req['user_id'] = $request->user()->id;
    $data = Todo::create($req);
    return response()->json(['status' => true, 'data' => $data], 201);
}