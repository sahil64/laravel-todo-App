@extends('todo.layout')

@section('content')
    <div class='flex justify-center pb-5 border-b pb-3'>
        <h1 class="text-2xl ">{{$todo->title}} </h1>
        <a href="/todo/"  class="mx-5 p-2 text-gray-300 cursor-pointer"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <x-alert />
        <div class="py-2 px-2 ">
            {{$todo->description}}
        </div>
    
        @if ($todo->steps()->count()>0)
            <ol class="px-8 list-disc">
                @foreach ($todo->steps as $step)
                    <li> {{$step->name}}</li>                    
                @endforeach
            </ol>
        @endif
@endsection