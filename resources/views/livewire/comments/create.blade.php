<div x-data="{ open: false }">


    <input
        x-show="!open" @click="open = ! open"
        type="email" name="email" id="email"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        placeholder="{{ __('Reply..') }}">


@auth()
        <form wire:submit="store" x-show="open" @click.outside="open = false">

    <textarea

        wire:model="form.comment"

        placeholder="{{ __('Reply..') }}"

        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"

    ></textarea>

            <x-input-error :messages="$errors->get('form.comment')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Comment') }}</x-primary-button>

        </form>

    @else

    <div class="text-sm text-red-600 flex justify-center py-2" x-show="open" @click.outside="open = false">
        Please login to reply to this chirp
    </div>
@endauth

</div>
