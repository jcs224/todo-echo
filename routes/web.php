<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('todos');
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
    return response()->json($todo);
});

Route::delete('todos/{id}', function($id) {
    $todo = \App\Todo::find($id);
    $todo->delete();
    return response()->json($todo);
});

Route::put('todos/{id}/complete', function($id) {
    $todo = \App\Todo::find($id);
    $todo->completed = true;
    $todo->save();
    return response()->json($todo);
});

Route::put('todos/{id}/uncomplete', function($id) {
    $todo = \App\Todo::find($id);
    $todo->completed = false;
    $todo->save();
    return response()->json($todo);
});
