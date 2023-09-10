<?php

namespace App\Livewire\Forms\Chirps;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ChirpForm extends Form
{

    #[Rule('required|string|max:255')]
    public string $message = '';


    public function create(): void

    {

        $validated = $this->validate();



        auth()->user()->chirps()->create($validated);



        $this->message = '';



    }
}
