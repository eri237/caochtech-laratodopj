<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class Todocontroller extends Controller
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

    public function update(Request $request,todo $todo) {
        $this->validate($request, Todo::$rules);
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }

    public function delete(todo $todo) {
        $todo->delete();
       return redirect('/');
     }
}
