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

    <b>
        <h1>Todos os clientes</h1>
    </b>
    <table>
        <thead>
            <tr style=" background: #131313; color :white;">
                <th>Id do cliente</th>
                <th>Nome do cliente</th>
                <th>Username do cliente</th>
                <th>Cep do cliente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->username}}</td>
                <td>{{$cliente->cep}}</td>

                @endforeach
            </tbody>
        </table>

        <b>
            <h1>Fichas de treino</h1>
        </b>
        <table>
            <thead>
                <tr style=" background: #131313; color :white;">
                    <th>Equipamento</th>
                    <th>Quantidade de Série</th>
                    <th>Quantidade de repetição</th>
                    <th>Descrição</th>
                    <th>Nome do cliente</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fichas as $ficha)
                <tr>
                    <td>{{$ficha->equipamento}}</td>
                    <td>{{$ficha->serie}}</td>
                    <td>{{$ficha->repeticao}}</td>
                    <td>{{$ficha->descricao}}</td>
                    <td>{{$ficha->user_name}}</td>
                    <td><a class="bg-red-200 rounded hover:bg-red-300" href="{{ route('rm-ficha', $ficha)}}">Excluir</a></td>
                    @endforeach
                </tbody>
            </table>
        </center>

        <center>
    <b>
        <h1>Todos os Equipamentos</h1>
    </b>

    <thead>
    <table>
            <tr style="background: #131313; color :white;">
                <th>Nome do equipameto</th>
                <th>Descrição do equipameto</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
            <tr>
                <td>{{$equipamento->name}}</td>
                <td>{{$equipamento->descricao}}</td>
            </tr>

            @endforeach

        </tbody>
    </table>
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
