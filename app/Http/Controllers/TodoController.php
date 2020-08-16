<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use App\Step;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
       //$this->middleware('auth')->except('index');
    }

    public function index(){
        //$todos = Todo::all();
        //$todos = Todo::orderby('completed')->get();
        //$todos=auth()->user()->todos()->orderBy('completed')->get(); // order by is from sql query
        $todos=auth()->user()->todos->sortBy('completed'); // sort by from collection 
        //return view('todos.index')->with(['todos'=> $todos]);
        return view('todo.index',compact('todos'));
    }

    public function create(){
        return view('todo.create');
    }

    public function store(TodoCreateRequest $request){
        //$request->validate([
        //    'title'=>'required|max:255',
        //]);
        //dd($request->all());
        $todo = auth()->user()->todos()->create($request->all());
        if($request->Step){
            foreach($request->Step as $step) {
                $todo->steps()->create(['name'=> $step]);
            }
        }
        //Todo::create($request->all());
        return redirect()->back()->with('message','TOdo Saved successfully');
    }
    public function edit(Todo $todo){
        //dd ($todo->title);
        //$todo=Todo::find($id);
        //return ($todo);
        return view('todo.edit',compact('todo'));
    }

    public function show(Todo $todo){
        //return ($todo->steps);
        //$todo=Todo::find($id);
        //return ($todo);
        return view('todo.show',compact('todo'));
    }

    public function update(TodoCreateRequest $request ,Todo $todo){
        //dd($request->all());
        $todo->update(['title'=>$request->title]);
        if($request->StepName){
            foreach($request->StepName as $key=>$val) {
                $id=$request->StepId[$key];
                if($id==""){
                    $todo->steps()->create(['name'=> $val]);
                }else{
                    $step=Step::find($id);
                    $step->update(['name'=> $val]);                   
                }

            }
        }
        //$todo->update($request->all());
        
        return redirect(route('todo.index'))->with(['message'=>'Todo updated Successfully']);
    }

    public function complete(Request $request ,Todo $todo){
        $todo->update(['completed'=>True]);
        return redirect()->back()->with(['message'=>'Todo Status Updated to Complete']);
    }

    public function incomplete(Request $request ,Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect()->back()->with(['message'=>'Todo Status Updated to InComplete']);
    }

    public function destroy(Request $request ,Todo $todo){
        $todo->delete();
        return redirect()->back()->with(['message'=>'Todo Deleted Successfully']);
    }
}
