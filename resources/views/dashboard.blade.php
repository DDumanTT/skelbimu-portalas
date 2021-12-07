<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Skelbimai (' . count($posts) . ')'  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-center mb-3">
                        <form method="GET" action="{{ route('search') }}">
                            <div class="flex shadow-sm">
                                <x-input type="text" name="search" value="{{ Request::get('search') }}" class="px-4 py-2 w-80 rounded-r-none" placeholder="Paieška..." required />
                                <button class="flex items-center justify-center px-4 rounded-md border border-l-0 rounded-l-none border-gray-300 transition hover:bg-gray-100">
                                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="relative grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-1 w-full">
                        @if($posts->isNotEmpty())
                        @foreach ($posts as $post)
                        <x-post-card :post="$post" />
                        @endforeach
                        @else
                        <div>
                            <p>Nėra skelbimų.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
