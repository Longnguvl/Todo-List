<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

SendEmail::dispatch($user);

class TodoController extends Controller
{
    // Create a new todo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $todo = Todo::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);

        return response()->json($todo, 201);
    }

    // Retrieve a single todo
    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        return response()->json($todo);
    }

    // Update a todo
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->update($request->only(['title', 'completed']));

        return response()->json($todo);
    }

    // Delete a todo
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }

    /**
    * @api {get} /todos Retrieve all todos
    * @apiSuccess {Array} todos List of todos
    */
    // Retrieve all todos
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        return response()->json($todos);
    }
}