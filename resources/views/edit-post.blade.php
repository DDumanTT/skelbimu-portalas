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
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('edit-post', $post) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="mt-4">
                            <x-label for="title" :value="__('Pavadinimas')" />

                            <x-input id="title" class="flex mt-1 w-full" type="text" name="title" :value="$post->title" required autofocus />
                        </div>
                        <!-- Body -->
                        <div class="mt-4">
                            <x-label for="body" :value="__('Tekstas')" />

                            <x-text-area id="body" class="flex mt-1 w-full" rows="15" type="text" name="body" :value="$post->body" required autofocus />
                        </div>
                        <!-- Price -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Kaina')" />

                            <x-input id="price" class="flex mt-1 w-full" type="number" min="0" step=".01" name="price" :value="$post->price" autofocus />
                        </div>
                        <x-label for="del_images[]" :value="__('Pažymėkite nuotraukas trynimui:')" class="mt-4" />
                        <div class="grid grid-cols-5 gap-1 mt-1">
                            @foreach ($post->images as $image)
                            <div class="relative max-h-48 flex-col items-center justify-center">
                                <img src="{{ asset('/storage/' . $image->filepath) }}" class="object-cover w-full h-full" />
                                <label for="{{ $image->id }}" class="absolute inset-0 w-full h-full bg-gray-500 bg-opacity-0 hover:bg-opacity-50"></label>
                                <input type="checkbox" id="{{ $image->id }}" name="del_images[]" value="{{ $image->id }}" class="absolute inset-1">
                            </div>
                            @endforeach
                        </div>
                        @if($post->images->count() < 5) <div class="mt-4">
                            <p>Galite kelti dar {{ 5 - $post->images->count() }} nuotraukas(ą).</p>
                            <input type="file" name="images[]" accept="image/png, image/jpeg, image/jpg" multiple>
                </div>
                @else
                <div class="mt-4">
                    <p>Negalite kelti daugiau nuotraukų.</p>
                </div>
                @endif
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
