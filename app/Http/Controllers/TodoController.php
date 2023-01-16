<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('completed')->get();
        // return $todos;
        return view('todos.index',compact('todos'));
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);
        Todo::create($request->all());
        return redirect()->back()->with('message','Created Successfully');
    }
    public function edit(Todo $todo)
    {
        // $todo=Todo::find($id);
        return view('todos.edit',compact('todo'));
    }
    public function update(Request $request,Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);
        $todo->update(['title'=> $request->title]);
        $todo->update(['completed'=> false]);
        return redirect()->back()->with('message','Task Updated!');
        // return redirect(route('todo.index'))->with('message','');
    }
    public function complete(Request $request,Todo $todo)
    {
        $todo->update(['completed'=> true]);
        return redirect()->back()->with('message','Task marked as Complete!');
        // return redirect(route('todo.index'))->with('message','');
    }
    public function incomplete(Request $request,Todo $todo)
    {
        $todo->update(['completed'=> false]);
        return redirect()->back()->with('message','Task marked as Incomplete!');
        // return redirect(route('todo.index'))->with('message','');
    }
    public function del(Request $request,Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted!');
        // return redirect(route('todo.index'))->with('message','');
    }
}
