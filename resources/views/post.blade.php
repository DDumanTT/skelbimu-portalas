<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Skelbimas'  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-300 p-6">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="">
                            <div class="mb-1">
                                @if (count($post->images()->get()) == 0)
                                <img src="{{ asset('/storage/images/placeholder-image.png') }}" class="object-contain" />
                                @else
                                <img src="{{ asset('/storage/' . $post->images()->first()->filepath) }}" class="object-contain" />
                            </div>
                            <div class="grid grid-cols-2 gap-1">
                                @if (count($post->images()->get()) != 1)
                                @foreach ($post->images()->get() as $image)
                                @if ($loop->first) @continue @endif
                                <div class="max-h-48 overflow-hidden flex items-center">
                                    <img src="{{ asset('/storage/' . $image->filepath) }}" class="object-contain" />
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="">
                            <p class="border-b text-4xl mb-5 break-words">{{ $post->title }}</p>
                            <p class="break-words">{{ $post->body }}</p>
                        </div>
                    </div>
                    @auth
                    @if (Auth::user()->id == $post->user->id || Auth::user()->role == 1)
                    <!-- @roles(['client', 'mod']) -->
                    <div class='inline-flex w-full justify-end mb-2'>
                        <form method="POST" action="{{ route('delete-post', $post) }}">
                            @csrf
                            @method('DELETE')
                            <x-button name="post" class="ml-4 bg-red-600">
                                {{ __('Trinti skelbimą') }}
                            </x-button>
                        </form>
                    </div>
                    <!-- @endroles -->
                    @endif
                    @endauth
                </div>

                <div class="p-6 border-b border-gray-300">
                    <p class="mb-5">{{ 'Žinutės (' . count($messages) . ')'  }}</p>
                    @foreach ($messages as $message)
                    <x-message :message="$message" />
                    @endforeach
                </div>
                <div class="p-6">
                    @if (@Auth::check())
                    <p>Parašykite žinutę!</p>
                    <form action="{{ route('new-message') }}" method="POST">
                        @csrf
                        <!-- Message box -->
                        <div class="mt-4">
                            <x-label for="text" :value="__('Žinutė')" />

                            <x-text-area id="text" class="flex mt-1 w-full" rows="2" type="text" name="text" :value="old('text')" required />
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Siūsti') }}
                            </x-button>
                        </div>
                    </form>
                    @else
                    <p>Prisijunkite, kad rašytumėte žinutę.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
