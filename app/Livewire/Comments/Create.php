<?php

namespace App\Livewire\Comments;

use App\Livewire\Forms\Comments\CommentForm;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Create extends Component
{

   public ?Chirp $medel;
   public CommentForm $form;


    public function mount()
    {
        $this->form->setModel($this->medel);
    }


    public function store()
    {
       $this->form->comment();
        $this->dispatch('comment-created');
    }


    public function render()
    {
        return view('livewire.comments.create');
    }
}
