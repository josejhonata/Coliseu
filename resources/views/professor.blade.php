<x-app-layout>

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coliseu') }}
        </h2>
    </x-slot>

@php
$clientes=App\Models\User::where('tipo','cliente')->get();
$fichas=App\Models\Ficha_treino::all();
$equipamentos=App\Models\equipamento::all();
@endphp
<center>

            <p class="text-lg text-center font-bold m-5">Todos os Clientes</p>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">Id do Cliente</th>
                <th class="px-4 py-3">Nome</th>
                <th class="px-4 py-3">Username</th>
                <th class="px-4 py-3">Cep</th>
            </tr>
               
            <!-- each row -->
            <tr class="bg-gray-700 border-b border-gray-600">
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->name}}</td>
                    <td>{{$cliente->username}}</td>
                    <td>{{$cliente->cep}}</td>
    
                    @endforeach
            </tr>              
            </table>
    
            
            

            <p class="text-lg text-center font-bold m-5">Fichas de Treino</p>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">Equipamento</th>
                <th class="px-4 py-3">Quantidade Séries</th>
                <th class="px-4 py-3">Repetição</th>
                <th class="px-4 py-3">Descrição</th>
                <th class="px-4 py-3">Cliente</th>
                <th class="px-4 py-3">Opção 1</th>
                <th class="px-4 py-3">Opção 2</th>

            </tr>
               
            <!-- each row -->
            <tr class="bg-gray-700 border-b border-gray-600">
                @foreach ($fichas as $ficha)
                <tr>
                    <td>{{$ficha->equipamento}}</td>
                    <td>{{$ficha->serie}}</td>
                    <td>{{$ficha->repeticao}}</td>
                    <td>{{$ficha->descricao}}</td>
                    <td>{{$ficha->user_name}}</td>
                    <td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('', $ficha)}}">Editar</button></td>
                    <td><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('rm-ficha', $ficha)}}">Excluir</button></td>
                    @endforeach
                </tbody>
            </tr>     
            </table>

        
        </center>

        <center>

            <p class="text-lg text-center font-bold m-5">Todos os Equipamentos</p>
            <table class="rounded-t-lg m-5 w-2/6 mx-auto bg-gray-800 text-gray-200">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">Equipamento</th>
                <th class="px-4 py-3">Descrição do Equipamento</th>
            </tr>
               
            <!-- each row -->
            <tr class="bg-gray-700 border-b border-gray-600">
                @foreach ($equipamentos as $equipamento)
                <tr>
                    <td>{{$equipamento->name}}</td>
                    <td>{{$equipamento->descricao}}</td>
                </tr>

            @endforeach
            </tr>              
            </table>
           

    <thead>
    
</center>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form method="POST" action="{{ route('add-ficha') }}">
                                @csrf


                                <div>
                                    <x-label for="equipamento" :value="__('Equipamentos do treino')" />

                                    <x-input id="equipamento" class="block mt-1 w-full" type="text" name="equipamento" :value="old('equipamento')" required/>
                                </div>


                                <div>
                                    <x-label for="serie" :value="__('Quantidade de serie')" />

                                    <x-input id="serie" class="block mt-1 w-full" type="text" name="serie" :value="old('serie')" required/>
                                </div>


                                <div>
                                    <x-label for="repeticao" :value="__('Quantidade de repetição')" />

                                    <x-input id="repeticao" class="block mt-1 w-full" type="text" name="repeticao" :value="old('repeticao')" required/>
                                </div>

                                <div>
                                    <x-label for="descricao" :value="__('Descrição de treino')" />

                                    <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required/>
                                </div>


                                <div class="mt-4">
                <x-label for="user_name" :value="__('Informe o nome do aluno')" />

                <x-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required />
            </div>


            <x-button class="ml-4">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</div>
</div>
</div>
</div>

</x-app-layout>
