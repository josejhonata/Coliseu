<style type="text/css">
table{
width: 70%;
padding: 5%;
text-align: center;
background: white;
}
    tr{

border-bottom: 1px solid #ddd;

}
th{
border-right: 1px solid #ddd;
}
.tamanho{
    font-size: 40px;
}
</style>
<x-app-layout>


@php
$fichas=App\Models\Ficha_treino::where('user_name',Auth::user()->name)->get();
$cliente=Auth::user()->id;
$exercicios=App\Models\exercicio::all();
@endphp


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

                        <a href="{{ route('edit-user', $cliente)}}">Alterar Perfil</a>
                    </x-slot>
                </x-dropdown>
            </div>
            </x-slot>   


<h1 class="tamanho">Minhas fichas de treino</h1>

<center>
    <thead>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr style="background: #131313; color :white;">
                <th>Titulo</th>
                <th>Data início</th>
                <th>Data fim</th>
                <th>Professor</th>
                <th>Tipo de treino</th>
                <th>Situação</th>
                <th>Opção</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($fichas as $ficha)

                        <tr>
                <td>{{$ficha->titulo}}</td>
                <td>{{$ficha->data_inicio}}</td>
                <td>{{$ficha->data_final}}</td>
                <td>{{$ficha->user_professor}}</td>
                <td>{{$ficha->tipo_de_treino}}</td>
                <td>{{$ficha->situacao}}</td>
                <td>
                    <div x-data="{add_modal:false}">
                        <div @click= "add_modal = true">
                    <x-button class="ml-4">Visualizar</x-button>
                    </div>

                    
<div class="fixed z-10 inset-0 overflow-y-auto" x-show="add_modal">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
    -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
    <div hidden>   
@foreach ($fichas as $fichaa)
{{$foi= $fichaa->id}}
@endforeach
</div>
<center>
<table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
      <tr style="background: #131313; color :white;">
    <th>qdq</th>
    <th>dqwq</th>
    <th>dqwdqw</th>
    <th>dqqwd</th>
    <th>dqwdq</th>
    <th>dqwdq</th>
    </tr>

     @foreach ($exercicios as $exercicio)
     @if ($foi == $exercicio->id_ficha)

        <tbody>
     <tr>
     <td>{{$exercicio->equipamento}}</td>
     <td>{{$exercicio->descricao}}</td>
     <td>{{$exercicio->serie}}</td>
     <td>{{$exercicio->repeticao}}</td>
    <td>{{$exercicio->descanso}}</td>
    <td>{{$exercicio->observacao}}</td>
    </tr>
     @endif
     @endforeach 
     </tbody> 
     </table>  
     </center>    
    </div>
  </div>
</div>


                    </div>
                    

                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</center>

 </x-app-layout>

 