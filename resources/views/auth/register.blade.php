<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <p class="block w-auto font-black text-2xl">SKELBIMŲ PORTALAS</p>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="inline-flex">
                <!-- Name -->
                <div class="mt-4">
                    <x-label for="name" :value="__('Vardas')" />

                    <x-input id="name" class="flex mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Surname -->
                <div class="mt-4">
                    <x-label for="surname" :value="__('Pavardė')" />

                    <x-input id="surname" class="flex mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('El. paštas')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone number -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Telefono numeris')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Slaptažodis')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Slaptažodžio patvirtinimas')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Jau prisiregistravę?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registruotis') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
