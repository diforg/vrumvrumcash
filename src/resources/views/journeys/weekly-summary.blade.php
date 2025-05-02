<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resumo Semanal de Jornadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 text-right">
                    <a href="{{ route('journeys.index') }}" class="btn btn-primary px-6 py-2 mr-1 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-200">
                        Ver Listagem Diária
                    </a>                
                </div>

                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                                    <th class="px-4 py-3 text-left">Ano</th>
                                    <th class="px-4 py-3 text-left">Semana</th>
                                    <th class="px-4 py-3 text-right">Total R$</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm font-light">
                                @forelse ($weeklyTotals as $item)
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="px-4 py-3">{{ $item->month }}</td>
                                        <td class="px-4 py-3">{{ $item->week_range }}</td>
                                        <td class="px-4 py-3 text-right">R$ {{ number_format($item->total, 2, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-3 text-center text-gray-500">Nenhum dado encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
