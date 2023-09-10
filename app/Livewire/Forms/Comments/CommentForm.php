<?php

namespace App\Livewire\Forms\Comments;

use App\Models\Chirp;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CommentForm extends Form
{
    public ?Chirp $medel;

    #[Rule('required')]
    public string $comment;


    public function setModel(?Chirp $model){
         $this->medel = $model;
    }

    public function comment()
    {
        $this->validate();
        $this->medel->commentAsUser(auth()->user(), $this->comment);

        $this->comment = '';

    }
}
