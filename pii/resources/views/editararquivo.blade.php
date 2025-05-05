<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Arquivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('arquivos.update', $arquivo->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nome do Arquivo -->
                        <div class="mb-4">
                            <x-input-label for="arquivo" :value="__('Nome do Arquivo')" />
                            <x-text-input id="arquivo" class="block mt-1 w-full" 
                                         type="text" name="arquivo" 
                                         value="{{ old('arquivo', $arquivo->arquivo) }}" required />
                            <x-input-error :messages="$errors->get('arquivo')" class="mt-2" />
                        </div>

                        <!-- Categoria -->
                        <div class="mb-4">
                            <x-input-label for="categoria" :value="__('Categoria')" />
                            <x-text-input id="categoria" class="block mt-1 w-full" 
                                         type="text" name="categoria" 
                                         value="{{ old('categoria', $arquivo->categoria) }}" required />
                            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                        </div>

                        <!-- Novo Arquivo (Opcional) -->
                        <div class="mb-4" x-data="{ fileName: '' }">
                            <x-input-label for="anexo" :value="__('Substituir Arquivo (opcional)')" />
                            <div class="flex items-center mt-1">
                                <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-100">
                                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="mt-2 text-base leading-normal" x-text="fileName || 'Selecione um arquivo PDF'"></span>
                                    <input type="file" id="anexo" name="anexo" class="hidden" 
                                           @change="fileName = $event.target.files[0]?.name"
                                           accept=".pdf">
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('anexo')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">
                                Arquivo atual: 
                                <a href="{{ route('arquivos.download', $arquivo->id) }}" class="text-blue-500">
                                    {{ $arquivo->anexo }}
                                </a>
                            </p>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('arquivos.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
                                Cancelar
                            </a>
                            <x-primary-button class="ml-4">
                                {{ __('Atualizar Arquivo') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>