<x-guest-layout>
    <html>
        <body>
        <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Abas de Login/Registro -->
            <div class="flex border-b">
                <button onclick="openTab('login')" 
                        class="flex-1 py-4 px-6 text-center font-medium text-gray-700 hover:text-blue-500 focus:outline-none tab-button active"
                        id="login-tab">
                    Login
                </button>
                <button onclick="openTab('register')" 
                        class="flex-1 py-4 px-6 text-center font-medium text-gray-700 hover:text-blue-500 focus:outline-none tab-button"
                        id="register-tab">
                    Registrar
                </button>
            </div>

            <!-- Conteúdo das Abas -->
            <div class="p-6">
                <!-- Formulário de Login -->
                <div id="login-content" class="tab-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input id="email" type="email" name="email" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                            <input id="password" type="password" name="password" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" 
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">
                                    Lembrar-me
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                                    Esqueceu sua senha?
                                </a>
                            @endif
                        </div>

                        <button type="submit" 
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Entrar
                        </button>
                    </form>
                </div>

                <!-- Formulário de Registro -->
                <div id="register-content" class="tab-content hidden">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('E-mail')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4" x-data>
                            <x-input-label for="cpf" :value="__('CPF')" />
                            <x-text-input id="cpf" class="block mt-1 w-full"
                                          type="text"
                                          name="cpf"
                                          autocomplete="new-cpf"
                                          x-mask="999.999.999-99" placeholder="Informe apenas os números" />
                            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Senha')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Já tem uma conta?') }}
                            </a>

                            <button type="submit" class="ms-4 py-2 px-4 bg-green-600 text-white rounded-md">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para alternar entre abas -->
    <script>
        function openTab(tabName) {
            // Esconde todos os conteúdos
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Mostra o conteúdo selecionado
            document.getElementById(tabName + '-content').classList.remove('hidden');
            
            // Atualiza o estilo das abas
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'border-b-2', 'border-blue-500');
            });
            
            document.getElementById(tabName + '-tab').classList.add('active', 'border-b-2', 'border-blue-500');
        }
        
        // Inicia com a aba de login visível
        document.addEventListener('DOMContentLoaded', function() {
            openTab('login');
        });
    </script>
</body>
</x-guest-layout>
