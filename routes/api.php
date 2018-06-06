<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todos', function() {
    $todos = \App\Todo::all();
    return response()->json($todos);
});

Route::get('todos/{id}', function($id) {
    $todo = \App\Todo::find($id);
    return response()->json($todo);
});

Route::post('todos', function(Request $request) {
    $todo = new \App\Todo;
    $todo->text = $request->input('text');
    $todo->completed = false;
    $todo->save();
    event(new \App\Events\TodoAdded($todo));
    return response()->json($todo);
});

Route::delete('todos/{id}', function($id) {
    $todo = \App\Todo::find($id);
    event(new \App\Events\TodoDeleted($todo));
    $todo->delete();
    return response()->json($todo);
});

Route::put('todos/{id}/complete', function($id) {
    $todo = \App\Todo::find($id);
    $todo->completed = true;
    $todo->save();
    event(new \App\Events\TodoCompleted($todo));
    return response()->json($todo);
});

Route::put('todos/{id}/uncomplete', function($id) {
    $todo = \App\Todo::find($id);
    $todo->completed = false;
    $todo->save();
    event(new \App\Events\TodoUncompleted($todo));
    return response()->json($todo);
});
