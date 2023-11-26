<?php

public function update(Request $request, $id): \Illuminate\Http\JsonResponse
{
    $validateUser = Validator::make($request->all(),
        [
            'has_completed' => 'required',
        ]);

    if ($validateUser->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validateUser->errors()
        ], 401);
    }

    $data = Todo::find($id);
    $data->has_completed = $request->has_completed;
    $data->update();
    return response()->json(['status' => true, 'data' => $data], 202);
}