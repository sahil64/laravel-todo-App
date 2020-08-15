<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex justify-center pb-2">
        <h2> Add steps if Required</h2>
        <i  wire:click="increment" class="fas fa-plus cursor-pointer  p-1"></i>
        <i  wire:click="decrement" class="fas fa-minus cursor-pointer  p-1"></i> 
    </div>
    {{--$steps--}}

    @foreach($steps as $key => $step)
        <div class="pb-1">
            <input type="text" name="Step[]" placeholder="{{'add Step '.$step}}" class="py-2 px-2 border rounded" />
            <i  wire:click="remove({{$key}})" class="fas fa-times cursor-pointer  p-2 text-red-400"></i>  
        </div>
    @endforeach
</div>
