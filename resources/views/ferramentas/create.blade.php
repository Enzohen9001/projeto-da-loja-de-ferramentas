<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Ferramenta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('ferramentas.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Nome') }}
                            </label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="text" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Descrição') }}
                            </label>
                            <textarea name="text" id="text" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>{{ old('text') }}</textarea>
                            @error('text')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Imagem da Ferramenta') }}
                            </label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF até 2MB</p>
                            <img id="preview" class="mt-4 max-h-64 rounded-lg" style="display:none;" alt="Preview">
                            @error('image')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="marca" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Marca') }}
                            </label>
                            <input type="text" name="marca" id="marca" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('marca') }}">
                            @error('marca')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="cor" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Cor') }}
                            </label>
                            <input type="text" name="cor" id="cor" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('cor') }}">
                            @error('cor')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="voltagem" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Voltagem') }}
                            </label>
                            <input type="text" name="voltagem" id="voltagem" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('voltagem') }}">
                            @error('voltagem')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="material" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Material') }}
                            </label>
                            <input type="text" name="material" id="material" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('material') }}">
                            @error('material')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="estoque" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Estoque') }}
                            </label>
                            <input type="number" name="estoque" id="estoque" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('estoque', 0) }}" min="0" required>
                            @error('estoque')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="categorias_id" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Categoria') }}
                            </label>
                            <select name="categorias_id" id="categorias_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">{{ __('Selecione uma categoria') }}</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categorias_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorias_id')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('ferramentas.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Cancelar') }}</a>
                            <button type="submit" style="display: inline-flex; align-items: center; padding: 8px 16px; background-color: #0066cc; color: white; border: none; border-radius: 6px; font-weight: bold; font-size: 12px; cursor: pointer; text-transform: uppercase;">
                                {{ __('Criar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview de imagem
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
