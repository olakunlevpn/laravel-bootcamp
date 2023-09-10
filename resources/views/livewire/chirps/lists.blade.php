<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

    @foreach ($chirps as $chirp)

        <div class="p-6 flex space-x-2" wire:key="{{ $chirp->id }}">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />

            </svg>

            <div class="flex-1">

                <div class="flex justify-between items-center">

                    <div>

                        <span class="text-gray-800">{{ $chirp->user->name }}</span>

                        <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>

                        @unless ($chirp->created_at->eq($chirp->updated_at))

                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>

                        @endunless

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

                                <x-dropdown-link wire:click="edit({{ $chirp->id }})">

                                    {{ __('Edit') }}

                                </x-dropdown-link>

                                <x-dropdown-link wire:click="delete({{ $chirp->id }})">

                                    {{ __('Delete') }}

                                </x-dropdown-link>



                            </x-slot>

                        </x-dropdown>

                    @endif

                </div>

                @if ($chirp->is($editing))

                    <livewire:chirps.edit :chirp="$chirp" :key="$chirp->id" />

                @else

                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>

                @endif

                <livewire:comments.comments :$chirp :key="$chirp->id" />




            </div>

        </div>

    @endforeach

        @if($loadMore)
          <div x-data="{}" x-intersect.threshold.50="$dispatch('load-more')"></div>
        @endif

        <div x-data="{ shown: false }" x-intersect="shown = {{ $loadMore }}">
            <div x-show="shown" x-clock x-transition>
                <div class="shadow rounded-md p-4 w-full mx-auto">
                    <div class="animate-pulse flex space-x-4">
                        <div class="rounded-full bg-slate-200 h-10 w-10"></div>
                        <div class="flex-1 space-y-6 py-1">
                            <div class="h-2 bg-slate-200 rounded"></div>
                            <div class="space-y-3">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="h-2 bg-slate-200 rounded col-span-2"></div>
                                    <div class="h-2 bg-slate-200 rounded col-span-1"></div>
                                </div>
                                <div class="h-2 bg-slate-200 rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="!shown" class="py-4 flex justify-center" x-clock x-transition>
                There's no more chirping in this nest
            </div>
        </div>



</div>
