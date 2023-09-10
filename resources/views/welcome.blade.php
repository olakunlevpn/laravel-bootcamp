<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

                @auth()
                    <livewire:chirps.create />
                @else

                    <div class="overflow-hidden rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            Ready to chirp your heart out? 🐦 <a href="{{ route('login') }}" class="text-blue-500">Log in</a> or <a href="{{ route('register') }}" class="text-blue-500">create an account</a> to join the flock!
                        </div>
                    </div>
                @endauth



                <livewire:chirps.lists />

            </div>
        </div>
    </div>

</x-layouts.app>

