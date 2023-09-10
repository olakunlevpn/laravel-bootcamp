
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

        @foreach ($comments as $comment)

            <div class="flex space-x-2 pl-6 pb-6 pt-6" :key="{{$comment->id}}">
                <div class="flex-1">

                    <div class="flex justify-between items-center">

                        <div>

                            <span class="text-gray-800">{{ $comment->commentator->name }}</span>

                            <small class="ml-2 text-sm text-gray-600">{{ $comment->created_at->format('j M Y, g:i a') }}</small>

                        </div>
                        @if ($chirp->user->is(auth()->user()))

                            <x-dropdown>

                                <x-slot name="trigger">

                                    <button>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">

                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />

                                        </svg>

                                    </button>

                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link wire:click="delete({{ $comment->id }})">

                                        {{ __('Delete') }}

                                    </x-dropdown-link>



                                </x-slot>

                            </x-dropdown>
                        @endif


                    </div>

                    <p class="mt-4 text-lg text-gray-900">{{ $comment->comment }}</p>

                </div>

            </div>

        @endforeach

            <livewire:comments.create :medel="$chirp" :key="$chirp->id" />


    </div>
