<?php

namespace App\Livewire\Chirps;

use App\Models\Chirp;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;

    public ?Chirp $editing = null;

    public $limitPerPage = 5;


    public  $loadMore = 'true';



    public function getListeners()
    {
        return [
            "chirp-created" => '$refresh',
            "chirp-updated" => '$refresh',
            'chirp-deleted' => '$refresh',

        ];
    }


    public function edit(Chirp $chirp):void
    {
        $this->editing = $chirp;
    }

    #[On('load-more')]
    public function loadMore()
    {
        $this->limitPerPage += 6;
        $newChirps = Chirp::with('user')->latest()->paginate($this->limitPerPage);

        if (!$newChirps->hasMorePages()) {
            $this->loadMore = 'false';
        }

    }


    #[On('chirp-edit-canceled')]

    public function cancelEdit(): void

    {

        $this->editing = null;

    }

    public function delete(Chirp $chirp): void

    {

        $this->authorize('delete', $chirp);



        $chirp->delete();
        $this->dispatch('chirp-deleted');

    }


    public function render()
    {
        $chirps = Chirp::with('user')->latest()->paginate($this->limitPerPage);
        return view('livewire.chirps.lists', [
            'chirps' => $chirps
        ]);
    }
}
