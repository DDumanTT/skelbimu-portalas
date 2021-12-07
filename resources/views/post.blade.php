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
                                <img src="{{ asset('/placeholder-image.png') }}" class="object-contain" />
                                @else
                                <img src="{{ asset('/storage/' . $post->images()->first()->filepath) }}" class="object-contain w-full" />
                            </div>
                            <div class="grid grid-cols-2 gap-1">
                                @if (count($post->images()->get()) != 1)
                                @foreach ($post->images()->get() as $image)
                                @if ($loop->first) @continue @endif
                                <div class="relative max-h-48 overflow-hidden flex items-center justify-center">
                                    <img src="{{ asset('/storage/' . $image->filepath) }}" class="object-cover w-full h-full" />
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <p class="flex justify-end text-xs text-gray-500">
                                {{ $post->created_at }}
                            </p>
                            <p class="border-b text-4xl mb-5 break-words">{{ $post->title }}</p>
                            <p class="break-words mb-auto pb-1">{{ $post->body }}</p>
                            <div class="border-t pt-2 pb-2 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="ml-2">{{ $post->user->name }} {{ $post->user->surname }}</span>
                            </div>
                            <div class="border-t pt-2 pb-2 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <span class="ml-2">{{ $post->user->email }}</span>
                            </div>
                            @if($post->user->phone)
                            <div class="border-t pt-2 pb-2 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-2">{{ $post->user->phone }}</span>
                            </div>
                            @endif
                            @if($post->price)
                            <div class="border-t pt-2 pb-2 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-2">{{ $post->price }}</span>
                            </div>
                            @endif
                            <div class="inline-flex w-full border-t">
                                <div class="mt-2 mr-1">
                                    @auth
                                    @if (Auth::user()->id == $post->user->id && Auth::user()->role != 3 || Auth::user()->role == 1)
                                    <form method="POST" action="{{ route('delete-post', $post) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-button name="post" class="bg-red-600">
                                            {{ __('Trinti') }}
                                        </x-button>
                                    </form>
                                    @endif
                                    @endauth
                                </div>
                                <div class="mt-2">
                                    @auth
                                    @if (Auth::user()->id == $post->user->id && Auth::user()->role != 3)
                                    <x-button-link href="{{ route('edit-post', $post) }}" class="bg-green-600">
                                        {{ __('Redaguoti') }}
                                    </x-button-link>
                                    @endif
                                    @endauth
                                </div>
                                <span class="flex flex-wrap items-center mt-2 ml-auto">
                                    Peržiūrų: {{ $post->views }}
                                </span>
                            </div>
                        </div>
                    </div>
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
