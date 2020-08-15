@extends('todo.layout')

@section('content')
    <div class='flex justify-center pb-5 border-b pb-3'>
        <h1 class="text-2xl ">All your Todos</h1>
        <a  href='/todo/create' class="mx-5 p-2 text-blue-300 cursor-pointer "> <i class="fas fa-plus-circle"></i> </a>      
    </div>
    <x-alert />
    <ul>
        @forelse ($todos as $todo )
            <li class="flex justify-between py-4 px-4">
                <div>
                    @if($todo->completed)
                        <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit();" class="fas fa-check text-green-600 px-2 cursor-pointer"></span>
                        <form style="display: none;" id="{{'form-incomplete-'.$todo->id}}" method="POST" action="{{route('todo.incomplete',$todo->id)}}">
                            @csrf
                            @method('put')
                        </form>                    
                    @else
                        <span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit();" class="fas fa-check px-2 text-gray-300 cursor-pointer"></span>
                        <form style="display: none;" id="{{'form-complete-'.$todo->id}}" method="POST" action="{{route('todo.complete',$todo->id)}}">
                            @csrf
                            @method('put')
                        </form>
                    @endif
                </div>

                @if($todo->completed)
                    <p class="line-through">{{$todo->title}}</p>
                @else
                    <a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
                @endif
                <div>
                    <a href="{{'/todo/'.$todo->id.'/edit'}}"class="mx-1 p-1 text-orange-300 rounded cursor-pointer" > <i class="fas fa-edit"></i></a>
                     <i  onclick="event.preventDefault();document.getElementById('form-delete-{{$todo->id}}').submit();" class="fas fa-trash mx-1 p-1 text-red-400 rounded cursor-pointer"></i>
                    <form style="display: none;" id="{{'form-delete-'.$todo->id}}" method="POST" action="{{route('todo.destroy',$todo->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </li>
        @empty
                <p> No record available , Please Add one!</p>
        @endforelse
    </ul>
@endsection