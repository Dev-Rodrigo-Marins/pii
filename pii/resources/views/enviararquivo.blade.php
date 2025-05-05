<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Envio de Arquivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('arquivos.store') }}" enctype="multipart/form-data">
        @csrf
                
                <div class="mb-4">
                    <x-input-label for="arquivo" :value="__('Nome do Arquivo')" />
                    <x-text-input id="arquivo" class="block mt-1 w-full" type="text" name="arquivo" :value="old('arquivo')" required autofocus />
                    <x-input-error :messages="$errors->get('arquivo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="categoria" :value="__('Categoria')" />
                    <x-text-input id="categoria" class="block mt-1 w-full" type="text" name="categoria" :value="old('categoria')" required />
                    <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="anexo" :value="__('Anexar Arquivo')" />
                    <input id="anexo" class="block mt-1 w-full" type="file" name="anexo" required />
                    <x-input-error :messages="$errors->get('anexo')" class="mt-2" />
                </div>

                <x-primary-button class="mt-4">
                    {{ __('Enviar Arquivo') }}
                </x-primary-button>
            </form>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            alert.style.display = 'none';
        }, 5000); // Alerta desaparecerá após 5 segundos (5000 milissegundos)
    </script>
    @endif
</x-app-layout>