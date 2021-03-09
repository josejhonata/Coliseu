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
    $fichas=App\Models\Ficha_treino::all();
    $cliente=Auth::user()->id;
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

    
@php
$id= request()->route()->parameters['User'];

$exercicios=App\Models\exercicio::find($id);
$fichas=App\Models\Ficha_treino::find($id);
@endphp
    
    <h1 class="tamanho">Minha Ficha de Treino {{ $fichas->titulo }}</h1>
    
    <center>
        <thead>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
                <tr style="background: #131313; color :white;">
                    <th>Equipamento</th>
                    <th>Descrição</th>
                    <th>Série</th>
                    <th>Repetição</th>
                    <th>Descanso</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody>
    
               
                <tr>
                    <td>{{$exercicios->equipamento}}</td>
                    <td>{{$exercicios->descricao}}</td>
                    <td>{{$exercicios->serie}}</td>
                    <td>{{$exercicios->repeticao}}</td>
                    <td>{{$exercicios->descanso}}</td>
                    <td>{{$exercicios->observacao}}</td>
                    <td>
                </tr>

                
            </tbody>
        </table>
    </center>
            <a href="/cliente" class="flex items-center justify-center">
                <x-button class="ml-4">Voltar</x-button>
            </a>
    
     </x-app-layout>