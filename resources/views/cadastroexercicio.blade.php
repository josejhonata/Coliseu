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
$fichas=App\Models\Ficha_treino::where('situacao','ativa')->get();
$equipamentos=App\Models\equipamento::all();
$exercicios=App\Models\exercicio::all();
 @endphp


 <center>
    <h1>Escolher a Ficha para Cadastrar Exercicio</h1>
    <thead>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr style="background: #131313; color :white;">
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
                    <a href="{{route('exercicio', $ficha->id)}}">
                        <x-button class="ml-4">Cadastro exercicio</x-button>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</center>




<!--
<center>
    <thead>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr style="background: #131313; color :white;">
                <th>Equipamento</th>
                <th>Descrição</th>
                <th>Serie</th>
                <th>Repetição</th>
                <th>Descanso</th>
                <th>Observação</th>
                <th>Opção</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($exercicios as $exercicio)
            <tr>
                <td>{{$exercicio->equipamento}}</td>
                <td>{{$exercicio->descricao}}</td>
                <td>{{$exercicio->serie}}</td>
                <td>{{$exercicio->repeticao}}</td>
                <td>{{$exercicio->descanso}}</td>
                <td>{{$exercicio->observacao}}</td>
                <td>
                <a href="">
                        <x-button class="ml-4">Visualizar</x-button>
                    </a>

               <a href="">
                        <x-button class="ml-4">Editar</x-button>
                    </a>

                    <a href="{{ route('rm-exercicio', $exercicio)}}">
                        <x-button class="ml-4">Excluir</x-button>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</center>
-->
 </x-app-layout>
