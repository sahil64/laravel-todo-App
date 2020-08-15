@extends('todo.layout')

@section('content')
    <div class='flex justify-center pb-5 border-b pb-3'>
        <h1 class="text-2xl ">todo</h1>
        <a href="/todo/"  class="mx-5 p-2 text-gray-300 cursor-pointer"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <x-alert />

        <div class="py-2 px-2">
             {{$todo->title}} 
        </div>
        <div class="py-2 px-2 ">
            {{$todo->description}}
        </div>
    
@endsection