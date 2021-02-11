<x-app-layout>
    <style>

         .button1{
                line-height: 22px;
                cursor: pointer;
                font-weight: 500;
                display: inline-flex;
                text-decoration: none;
                background-color:  #d85c23;
                color: white;
                border-radius: 28px;
                font-size: 20px;
                margin-right: 10px;
                padding: 16px 32px;
            }
            .button1:hover{
                background-color: #131313;
                box-shadow: 2px 2px 4px;
            }
            .button2{
                line-height: 22px;
                cursor: pointer;
                font-weight: 500;
                display: inline-flex;
                background-color:  #d85c23;
                text-decoration: none;
                color: white;
                border-radius: 28px;
                font-size: 20px;
                margin-left: 10px;
                padding: 16px 32px;
            }
            .button2:hover{
                background-color: #131313;
                box-shadow: 2px 2px 4px;

            }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coliseu') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{add_modal:false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" >

                    <div class="p-3 m-0.5" @click="add_modal = true" >
                   Cadastrar Professor
                   </div>
                </div>

            </div>
        </div>

<div class="fixed z-10 inset-0 overflow-y-auto" x-show="add_modal" >
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="p-3">
        <h1>  Cadastrar Professor</h1>

        <form action="{{route('registro')}}" method="POST">
            @csrf

            <div>
                <x-label for="tipo_id" :value="__('Tipo_Id')" />

                <x-input id="tipo_id" class="block mt-1 w-full" type="text" name="tipo_id" :value="old('tipo_id')" required/>
            </div>

            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" placeholder="Ex: Liliane" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required/>
            </div>


            <div>
                <x-label for="cpf" :value="__('Cpf')" />

                <x-input id="cpf" class="block mt-1 w-full"  type="text" name="cpf" :value="old('cpf')" required/>
            </div>

             <div class="mt-4">
                <x-label for="cep" :value="__('CEP')" />

                <x-input id="cep" class="block mt-1 w-full" placeholder="Ex: 53152152" type="text" name="cep" :value="old('cep')" required />
            </div>

            <div>
                <x-label for="username" :value="__('Nome de usuário')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required/>
            </div>




            <div>
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
            </div>

             <div>
                <x-label for="password_confirmation" :value="__('Confirma Senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required/>
            </div>



             <div class="flex items-center justify-end mt-4">
               <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Cancelar') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Registre-se') }}
                </x-button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>
    </div>



    <div class="py-12" x-data="{add_modal:false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" >

                    <div class="p-3 m-0.5" @click="add_modal = true" >
                   Cadastrar Aluno
                   </div>
                </div>

            </div>
        </div>
        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="add_modal" >
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>


</x-app-layout>

