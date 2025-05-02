<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ url('journeys') }}" class="p-6 text-gray-900">
                    @csrf

                    <div>
                        <label for="date_journey" class="block text-sm font-medium text-gray-700">Data da Jornada</label>
                        <input type="text" id="date_journey" name="date_journey" required
                            class="rounded-md border-gray-300" />
                    </div>

                    <div>
                        <label for="value_journey" class="block text-sm font-medium text-gray-700 mt-4">Valor da Jornada</label>
                        <input type="number" id="value_journey" name="value_journey" step="0.01" required
                            class="rounded-md border-gray-300" />
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-200">
                            Cadastrar Jornada
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
