@extends('todo.layout')

@section('content')
    <div class='flex justify-center pb-5 border-b pb-3'>
        <h1 class="text-2xl ">Update todo</h1>
        <a href="/todo/"  class="mx-5 p-2 text-gray-300 cursor-pointer"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <x-alert />
    <form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
        @csrf
        @method('patch')
        <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded" />
        <div>
            <textarea type="text" name="description" placeholder="description"  class="py-2 my-2 px-2 border rounded" >{{$todo->description}}</textarea>
        </div>
        
        @livewire('edit-step',['steps'=> $todo->steps ])

        @if ($todo->steps()->count()>0)
            @foreach ($todo->steps as $step)
            <!--<div class="p-2">
                <input type="text" name="Step[]" value="{{$step->name}}" class="py-2 px-2 border rounded" /> 
            </div>  -->            
            @endforeach
        @endif
        <input type="submit" value="update"  class="py-2 px-2 border rounded" />

    </form>    
@endsection