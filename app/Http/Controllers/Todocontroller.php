<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todo.index')->with('todos',$todos);
    }

    public function create(Request $request) {
        $this->validate($request, Todo::$rules);
        $todo = new Todo();
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }

    public function update(Request $request) {
        $this->validate($request, Todo::$rules);
        $todo = Todo::find($request->id);
        $todo->content = $request->content;
        $form = $request->all();
        $todo->fill($form)->save();
        return redirect()->route('todo.index');
    }

    public function delete(Request $request) {
        $todo = Todo::find($request->id);
        $todo->delete();
       return redirect('/');
     }
}
