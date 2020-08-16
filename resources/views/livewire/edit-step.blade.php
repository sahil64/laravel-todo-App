<div>
    {{-- In work, do what you enjoy. --}}
    <div class="flex justify-center pb-2">
        <h2> Add steps if Required</h2>
        <i  wire:click="increment" class="fas fa-plus cursor-pointer  p-1"></i>
        <i  wire:click="decrement" class="fas fa-minus cursor-pointer  p-1"></i> 
    </div>
    {{--$steps--}}

    @foreach($steps as $step)
        <div class="pb-1" wire:key="{{ $loop->index }}">
            <input type="text" value="{{ $step['name'] }}" name="StepName[]" placeholder="{{'add Step '. ($loop->index+1)}}" class="py-2 px-2 border rounded" />
            <input type="hidden" value="{{ $step['id'] }}" name="StepId[]"  />
            <i  wire:click="remove({{ $loop->index }})" class="fas fa-times cursor-pointer  p-2 text-red-400"></i>  
        </div>
    @endforeach
</div>
