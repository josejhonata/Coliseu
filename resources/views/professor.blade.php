<style type="text/css">
.tamanho{
    font-size: 40px;
}



</style>
<x-app-layout>

	<x-slot name="header">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-900 hover:text-gray-900 hover:border-gray-900 focus:outline-none focus:text-gray-900 focus:border-gray-900 transition duration-150 ease-in-out">
                            <div>Olá,{{ Auth::user()->name }}</div>

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
$fichas=App\Models\Ficha_treino::all();
$equipamentos=App\Models\equipamento::all();
@endphp
    
    <h1 class="flex items-center justify-center pr-96 mt-6 text-4xl font-sans">Fichas de treino cadastradas</h1>



<div class="flex items-center justify-end pr-6" >
    <a href="/cadastroficha">
        <x-button class="" >Nova ficha de treino</x-button>
        </a>
</div>
        
<div class="flex items-center justify-end pr-6 pt-6" >
    <a href="/cadastroexercicio">
             <x-button class="ml-3">Cadastrar exercicio</x-button>
                    </a>
</div>
    
    <center>
    <thead>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200 ">
            <tr style="background: #131313; color :white;" class="">
                <th>Titulo</th>
                <th>Tipo de treino</th>
                <th>Nome do aluno</th>
                <th>Stuação</th>
                <th>Opção</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($fichas as $ficha)
            <tr>
                <td>{{$ficha->titulo}}</td>
                <td>{{$ficha->tipo_de_treino}}</td>
                <td>{{$ficha->user_name}}</td>
                <td>{{$ficha->situacao}}</td>
                <td>

               <a href="{{ route('edit-ficha', $ficha)}}">
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
                                          Você Realmente deseja Realizar a Exclusão desta Ficha de Treino? Está ação é Feita de Maneira Permanente, Não sendo Possível Recuperar as Informações Excluídas que estão acossiadas à ficha de treino, de um Aluno.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                  <a href="{{ route('rm-ficha', $ficha)}}" type="button"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Excluir
                                  </button>
                                  <a href="/professor" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancelar
                                  </a>
                                </div>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</center>

</x-app-layout>

