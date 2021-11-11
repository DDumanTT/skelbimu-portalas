<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <p class="block w-auto font-black text-2xl">SKELBIMŲ PORTALAS</p>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Patvirtinkite slaptažodį prieš tęsiant.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Slaptažodis')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Patvirtinti') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
