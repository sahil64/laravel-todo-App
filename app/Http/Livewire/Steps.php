<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Steps extends Component
{
    public $steps=[];

    public function increment(){
        $this->steps[]=count($this->steps)+1;
    }

    public function decrement(){
       //dd($this->steps);
        array_pop($this->steps);
        //dd($this->steps);
    }

    public function remove($index){
        //dd($index);
        unset($this->steps[$index]);
         //array_pop($this->steps);
         //dd($this->steps);
     }

    public function render()
    {
        return view('livewire.steps');
    }
}
