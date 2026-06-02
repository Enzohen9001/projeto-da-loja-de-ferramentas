<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Ferramentas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('ferramentas.update', $ferramenta) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <div class="mt-2 mb-2">
                                <label for="name">Titulo:</label>
                            </div>
                            <input type="text" name="title" id="title" value="{{ $ferramenta->title }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                        </div>
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="name">Texto:</label>
                            </div>
                            <textarea type="text" name="text" id="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $ferramenta->text }}</textarea>
                        </div>
                        <div>
                            <div class="mb-2">
                                <label for="categorias_id">Categorias:</label>
                            </div>
                            <select id="categorias_id" name="categorias_id" class="col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}" @selected($categoria->id === $ferramenta->categorias_id)
                                    >{{$categoria->name}}
                                    </option>
                                @endforeach
                            </select>                            
                        </div>
                        <div class="mt-2 mb-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>