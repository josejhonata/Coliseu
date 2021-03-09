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

            .tamanho{
                font-size: 20px;
            }
            tr{

                border-bottom: 1px solid #ddd;

            }
            th{
                border-right: 1px solid #ddd;
            }
            table{
                width: 70%;
                padding: 5%;
                text-align: center;
                background: white;

            }
    </style>
   <x-slot name="header">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-900 hover:text-gray-900 hover:border-gray-900 focus:outline-none focus:text-gray-900 focus:border-gray-900 transition duration-150 ease-in-out">
                            <div><h1>Olá,{{ Auth::user()->name }}</h1></div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
 
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            </x-slot> 

   @php
$clientes=App\Models\User::where('tipo','cliente')->get();
@endphp
<center>

    <b>
        <h1 class="tamanho">Todos os Clientes</h1>
    </b>
    <thead>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr style="background: #131313; color :white;">
                <th>Nome do Aluno</th>
                <th>Username do Aluno</th>
                <th>Cpf do Aluno</th>
                <th>Cep do Aluno</th>
                <th>Tipo do Aluno</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->username}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->cep}}</td>
                <td>{{$cliente->tipo}}</td>
                <td>
                    
                    <a href="{{ route('edit-user', $cliente->id)}}">
                        <x-button class="ml-4">Editar</x-button>
                    </a>

                    <a href="{{ route('rm-user', $cliente->id)}}">
                        <x-button class="ml-4">Excluir</x-button>
                    </a>
                </td>
            </tr>

            @endforeach


        </tbody>
    </table>
</center>

    <div class="py-12" x-data="{add_modal:false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" >

                    <div class="p-3 m-0.5" @click="add_modal = true" >
                        <h1>Cadastro de Aluno</h1>
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
          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="p-3">
<b>
    <h1>Cadastro de Aluno</h1>
</b>
<form action="{{route('registro')}}" method="POST">
            @csrf

            <div>

                <x-input id="tipo" class="block mt-1 w-full" type="hidden" name="tipo" :value="'cliente'"/>
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
                 <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('cadastroaluno') }}">
                    {{ __('Cancelar') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Registre-se') }}
                </x-button>
            </div>

        </form>

</x-app-layout>

