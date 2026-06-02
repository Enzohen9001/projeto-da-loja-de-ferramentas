<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ferramentas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 mb-6">
                        <a href="{{ route('ferramentas.create') }}" style="color: white; text-decoration: none;">➕ Adicione uma nova ferramenta</a>
                    </button>

                    <div style="overflow-x: auto;">
                        <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Imagem') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Nome') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Descrição') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Marca') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Cor') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Voltagem') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Material') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Estoque') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Categoria') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Editar') }}</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">{{ __('Deletar') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ferramentas as $ferramenta)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-6 py-3">
                                        @if($ferramenta->image)
                                            <img src="{{ asset('storage/' . $ferramenta->image) }}" class="max-h-20 rounded" alt="Imagem">
                                        @else
                                            <span class="text-gray-400">Sem imagem</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->Nome }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->text }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->marca ?? '-' }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->cor ?? '-' }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->voltagem ?? '-' }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->material ?? '-' }}</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        @if($ferramenta->estoque < 5)
                                            <span style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 4px; font-weight: bold;">
                                                {{ $ferramenta->estoque }} ⚠️
                                            </span>
                                        @else
                                            {{ $ferramenta->estoque ?? 0 }}
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        @if($ferramenta->categoria)
                                            {{ $ferramenta->categoria->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3 text-center">
                                        <a href="{{ route('ferramentas.edit', $ferramenta) }}" class="text-blue-600 hover:text-blue-900 hover:underline">{{ __('Editar') }}</a>
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3 text-center">
                                        <form method="POST" action="{{ route('ferramentas.destroy', $ferramenta) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 hover:underline" onclick="return confirm('Tem certeza?')">{{ __('Deletar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="border border-gray-300 px-6 py-3 text-center">{{ __('Nenhuma ferramenta encontrada') }}</td>
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
