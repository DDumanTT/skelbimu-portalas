<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Naudotojų sąrašas'  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form id="roles_form" method="POST" action="{{ route('change-roles') }}">
                    @csrf
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs uppercase">Vardas</th>
                                <th class="px-6 py-3 text-left text-xs uppercase">Pavardė</th>
                                <th class="px-6 py-3 text-left text-xs uppercase">El. paštas</th>
                                <th class="px-6 py-3 text-left text-xs uppercase">Rolė</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->surname }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select name="{{$user->id}}" id="role" class='rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                        @foreach(config('roles_lt') as $id => $role)
                                        <option value="{{ $id }}" {{ $user->role == $id ? "selected" : "" }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="w-full inline-flex justify-end">
                <x-button form="roles_form" class="mt-2">
                    {{ 'Keisti' }}
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
