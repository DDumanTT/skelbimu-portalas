<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Naujas skelbimas'  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('new-post') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="mt-4">
                            <x-label for="title" :value="__('Pavadinimas')" />

                            <x-input id="title" class="flex mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>
                        <!-- Body -->
                        <div class="mt-4">
                            <x-label for="body" :value="__('Tekstas')" />

                            <x-text-area id="body" class="flex mt-1 w-full" rows="15" type="text" name="body" :value="old('body')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <p>Galite įkelti iki 5 nuotraukų.</p>
                            <input type="file" name="images[]" accept="image/png, image/jpeg, image/jpg" multiple>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Patvirtinti') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
