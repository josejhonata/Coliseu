<style type="text/css">
    table{
        border-collapse: collapse;
        text-align: center;
    }
    table td{
        border: 1px solid black;
    }
    table th{
        border:1px solid black;
    }
</style>
<x-app-layout>

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coliseu') }}
        </h2>
    </x-slot>

@php
$clientes=App\Models\User::where('tipo','cliente')->get();
$fichas=App\Models\Ficha_treino::all();
@endphp

<b>
<h1>Todos os clientes</h1>
</b>
<table>
    <thead>
        <tr>
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
        <tr>
            <th>Descrição</th>
            <th>Id do cliente</th>
            <th>Opções</th>
            </tr>   
     </thead>
    <tbody>
        @foreach ($fichas as $ficha)
        <tr>
            <td>{{$ficha->descricao}}</td>
            <td>{{$ficha->user_id}}</td>
            <td><a class="bg-red-200 rounded hover:bg-red-300" href="{{ route('rm-ficha', $ficha)}}">Excluir</a></td>
    @endforeach
    </tbody>
</table>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('add-ficha') }}">
            @csrf


            <div>
                <x-label for="descricao" :value="__('Descrição de treino')" />

                <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required/>
            </div>


            <div class="mt-4">
                <x-label for="user_id" :value="__('Informe o id do aluno')" />

                <x-input id="user_id" class="block mt-1 w-full" type="number" name="user_id" :value="old('user_id')" required />
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