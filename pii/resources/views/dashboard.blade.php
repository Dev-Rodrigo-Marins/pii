<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                </div>
                <div class="text-center p-8">
    <h2 class="text-xl font-bold mb-4"> O grupo OCTOS conta com seu apoio!<br><br>
    Sua doação ajuda a manter nosso conteúdo gratuito
    e de qualidade para todos os estudantes. <br><br>Doe via PIX</h2>
    <img src="{{ asset('images/qrcode-pix.png') }}" 
         alt="QR Code para doação" 
         class="mx-auto w-48 h-48">
    <p class="mt-4 text-sm">A dificuldade desta materia é igual 
     a soma das dificuldades das materias: <br> Logica de programação + Programação web I + Programação web II <br><br></p>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
