<?php

namespace App\Livewire\Comments;

use App\Models\Chirp;
use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class Comments extends Component
{
    public ?Chirp $chirp;
    public Collection  $comments;


    public function mount(): void

    {

        $this->getComments();

    }



    #[On('comment-created')]

    public function getComments(): void

    {

        $this->comments = $this->chirp->comments;

    }


    public function delete(Comment $comment): void
    {

        $this->authorize('delete', $comment);


        $comment->delete();

        $this->getComments();

    }



    public function render()
    {
        return view('livewire.comments.comments');
    }
}
