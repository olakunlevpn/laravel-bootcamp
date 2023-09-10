<?php

namespace App\Livewire\Chirps;

use App\Livewire\Forms\Chirps\ChirpForm;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{

  public  ChirpForm $form;



    public function store(): void

    {

        $this->form->create();

        $this->dispatch('chirp-created');

    }





    public function render()
    {
        return view('livewire.chirps.create');
    }
}
