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
                        <a href="{{ route('ferramentas.create') }}">😍 Adicione uma nova Ferramenta</a>
                    </button>
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Titulo</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Texto</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Editar</th>
                                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ferramentas as $ferramenta)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->title }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $ferramenta->text }}</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <a href="{{ route('ferramentas.edit', $ferramenta) }}" class="text-green-600 hover:text-green-900 hover:underline">Edit</a>
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <form method="POST" action="{{ route('ferramentas.destroy', $ferramenta) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem certeza?')" class="text-red-600 hover:text-red-900">
                                                Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   

    @forelse($ferramentas as $ferramenta)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    <div class="h-24 bg-gradient-to-r from-blue-500 to-purple-600 relative overflow-hidden flex items-end justify-between p-4">
                            <div class="absolute inset-0 bg-black/20"></div>
                            
                            <!-- Título à esquerda -->
                            <h3 class="text-3xl font-bold text-white line-clamp-2 relative z-10">
                                {{ $ferramenta->title }}
                            </h3>

                            <!-- Botões à direita -->
                            <div class="flex gap-2 relative z-10">
                                <a href="{{ route('ferramentas.edit', $ferramenta) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('ferramentas.destroy', $ferramenta) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza?')" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                                        Deletar
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full">
                                @foreach ($categorias as $categoria)
                                    @if($categoria->id == $ferramenta->categorias_id)
                                        Categoria # {{ $categoria->name }}
                                    @endif
                                @endforeach
                            </span>
                        </div>

                        <!-- Texto/Descrição -->
                        <p class="pl-1 h-auto text-lg text-gray-700 dark:text-gray-300 line-clamp-3 mb-4">
                            {{ $ferramenta->text }}
                        </p>

                        <!-- Footer -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                            <!--                             
                            <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-semibold text-sm transition-colors">
                                Ler mais
                            </a>
                            <button class="text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>Nenhum post encontrado</p>
    @endforelse

</x-app-layout>