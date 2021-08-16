<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;
use App\Todo;
use App\Step;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
    	// $todos = Todo::orderBy('completed')->get();
    	return view('todos.index', compact('todos'));
    }

    public function create()
    {
    	return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        // dd(auth()->user()->todos->step);
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach ($request->step as $step) {
                $todo->steps()->create(['name'=>$step]);
            }
        }
    	return redirect()->to(route('todo.index'))->with('message', 'Todo added successfully!');
    }

    // Route Modal Binding
    // public function edit(Todo $todo)
    // {
    // 	dd($todo->title);
    // 	// $todo = Todo::find($id);
    // 	return view('todos.edit', compact('todo'));
    // }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
    	return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
    	$todo->update($request->all());
        // dump($request->all());
        if($request->stepName){
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if(!$id)
                {
                    $todo->steps()->create(['name' => $value]);
                }
                else{
                    $step = Step::find($id);
                    $step->update(['name'=>$value]);
                }
            }
        }
        // die();
    	return redirect(route('todo.index'))->with('message', 'Updated!');
    }

    public function complete(Todo $todo)
    {
        if($todo->completed == true){
            $todo->update(['completed' => false]);
            return redirect()->back()->with('message', 'Todo marked as incomplete!');
        }
        else
        {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('message', 'Todo marked as completed!');
        }
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Todo has been deleted successfully!');
    }
}
