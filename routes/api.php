<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\TodoController;

Route::middleware('auth:sanctum')->prefix('todos')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::post('/', [TodoController::class, 'store']);
    Route::get('{id}', [TodoController::class, 'show']);
    Route::put('{id}', [TodoController::class, 'update']);
    Route::delete('{id}', [TodoController::class, 'destroy']);
});

Route::post('login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        return response()->json(['token' => $user->createToken('TodoApp')->plainTextToken]);
    }

    return response()->json(['message' => 'Unauthorized'], 401);
});