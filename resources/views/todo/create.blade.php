@extends('todo.layout')

@section('content')
    <div class='flex justify-center pb-5 border-b pb-3'>
        <h1 class="text-2xl "> what you want to add to-do list</h1>
        <a href="/todo/"  class="mx-5 p-2 text-gray-300 cursor-pointer"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <x-alert />
    <form method="post" action="{{route('todo.store')}}" class="py-5">
        @csrf
        <div>
            <input type="text" required  name="title" placeholder="title" class="py-2 px-2 my-2 border rounded" />
        </div>
        <div>
            <textarea type="text" name="description" placeholder="description"  class="py-2 my-2 px-2 border rounded" ></textarea>
        </div>

         @livewire('steps')

        <div>
            <input type="submit" value="create"  class="py-2 px-2 border rounded" />
        </div>
    </form>    
@endsection