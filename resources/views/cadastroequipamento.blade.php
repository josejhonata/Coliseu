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
$professors=App\Models\User::where('tipo','professor')->get();
$equipamentos=App\Models\equipamento::all();
@endphp
<center>
    <b>
        <h1 class="mt-6 text-4xl font-sans">Todos os Equipamentos</h1>
    </b>
    <thead>
    <table  class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr style="background: #131313; color :white;">
                <th>Nome do equipameto</th>
                <th>Descrição do equipameto</th>
                 <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
            <tr>
                <td>{{$equipamento->name}}</td>
                <td>{{$equipamento->descricao}}</td>
                 <td>
                    <a href="{{route('edit-equipamento', $equipamento)}}">
                        <x-button class="ml-4">Editar</x-button>
                    </a>

                    <div x-data="{add_modal:false}">

                        <div  @click="add_modal = true">

                                <x-button class="ml-4">Excluir</x-button>
                        </div>
                        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="add_modal" >
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    
                              <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                              </div>
                    
                              <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                  <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                      <!-- Heroicon name: outline/exclamation -->
                                      <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                      </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                      <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Exclusão Equipamento
                                      </h3>
                                      <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                          Você Realmente deseja Realizar a Exclusão deste Equipamento? Está ação é Feita de Maneira Permanente, Não sendo Possível Recuperar as Informações Excluídas.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                  <a href="{{ route('rm-equipamento', $equipamento)}}" type="button"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Excluir
                                  </button>
                                  <a href="/atendente/cadastroequipamento" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancelar
                                  </a>
                                </div>
                 </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</center>

<div class="py-12" x-data="{add_modal:false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="flex justify-end" @click="add_modal = true" >
                        <x-button> Cadastrar Equipamento</x-button>
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
    <h1>Cadastro de Equipamento</h1>
</b>
<form action="{{route('add-equipamento')}}" method="POST">
            @csrf


            <div>
                <x-label for="name" :value="__('Nome do Equipamento')" />

                <x-input id="name" class="block mt-1 w-full"  type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label :value="__('Descrição do Equipamento')" />

                <select name="descricao" id="descricao">
                    <option disabled>Selecione</option>
                    <option >Funcionando</option>
                    <option >Manutenção</option>
                </select>
            </div>


             <div class="flex items-center justify-end mt-4">
                 <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Cancelar') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Salvar') }}
                </x-button>
            </div>

        </form>


</x-app-layout>


