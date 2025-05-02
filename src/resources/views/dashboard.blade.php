<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 text-right">
                    <a href="{{ route('journeys.index') }}" class="btn btn-primary px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-200">Jornadas</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
