<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" >

                <img class="h-16 " src="{{ asset('dark.png') }}" />

            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Tipo ID -->
            <div>
                <x-label for="tipo_id" :value="__('Tipo_id')" />

                <x-input id="tipo_id" class="block mt-1 w-full" type="text" name="tipo_id" :value="old('tipo_id')" required/>
            </div>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" placeholder="Ex: Liliane" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" placeholder="Ex: liliane@gmail.com" type="email" name="email" :value="old('email')" required />
            </div>

                 <!-- CPF -->
            <div class="mt-4">
                <x-label for="cpf" :value="__('CPF')" />

                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required />
            </div>


            <!-- Cep -->
            <div class="mt-4">
                <x-label for="cep" :value="__('CEP')" />

                <x-input id="cep" class="block mt-1 w-full" placeholder="Ex: 53152152" type="text" name="cep" :value="old('cep')" required />
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Nome de usuário')" />

                <x-input id="username" class="block mt-1 w-full" placeholder="Ex: @user" type="text" name="username" :value="old('username')" required />
            </div>



            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full" placeholder="Senha"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" placeholder="Confirmar Senha"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já Registrado?') }}
                </a>

                <x-button class="ml-4" style="background:#d85c23;">
                    {{ __('Registre-se') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
