<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jornadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if(session('success'))
                <div class="p-6">
                    <div class="mb-4 text-green-700 bg-green-100 border border-green-300 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                </div>
                @endif

                <div class="p-6 text-gray-900 text-right">
                    <a href="{{ route('journeys.weeklySummary') }}" class="btn btn-primary px-6 py-2 mr-1 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-200">
                        Ver Resumo Semanal
                    </a>                
                    <a href="{{ route('journeys.create') }}" class="btn btn-primary px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-200">+</a>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Data</th>
                                    <th class="py-3 px-6 text-right">Valor</th>
                                    <th class="py-3 px-6 text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm font-light">
                                @forelse ($journeys as $journey)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="py-3 px-6">{{ \Carbon\Carbon::parse($journey->date_journey)->format('d/m/Y') }}</td>
                                        <td class="py-3 px-6 text-right">R$ {{ number_format($journey->value_journey, 2, ',', '.') }}</td>
                                        <td class="py-3 px-6 text-right">
                                            <form action="{{ route('journeys.destroy', $journey->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta jornada?');" class="inline-flex ml-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 011 1v0a1 1 0 01-1 1H7a1 1 0 01-1-1v0a1 1 0 011-1h10z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-3 px-6 text-center text-gray-500">Nenhuma jornada cadastrada.</td>
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
