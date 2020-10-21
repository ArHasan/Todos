<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;
use App\Todo;



class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    public function index(){
      
        // $todos = Todo::orderBy('completed')->get();
        
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index',compact('todos'));
    }

    public function create(){
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request){
/*
        $rules =[
            'title' => 'required|max:255',
        ];
        $messages = [
            'title.required' => 'স্যার আপনি কোন ডাটা দেন নাই !',
            'title.max' => 'স্যার ২৫৫ অক্ষর এর বেশি দিতে পারবেন না !!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

         $request->validate([
            'title' => 'required|max:255',
        ]);
        */
        $userId = auth()->id();
        $request['user_id'] = $userId;
     
        Todo::create($request->all());
        return redirect()->back()->with('massage','Todo Created Successfully');
    }

    public function edit(Todo $todo){
        // $todo = Todo::find($id);
        // dd($todo->title);
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo){
        
        $todo->update([
            'title' => $request->title,
        ]);
        return redirect(route('todo.index'))->with('massage','Updated ! ');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('massage','Task Mark as completed !');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('massage','Task Mark as Incompleted !');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('massage','Task Deleted !');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

}
