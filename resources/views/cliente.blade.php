<x-app-layout>

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coliseu') }}
        </h2>
    </x-slot>

@php
$fichas=App\Models\Ficha_treino::where('user_id',Auth::user()->id)->get();
@endphp

<b><h1>Ficha de Treino</h1></b>
<table>
    <thead>
        <tr>
            <th>Descrição da ficha</th>
        </tr>   
     </thead>
    <tbody>
        @foreach ($fichas as $ficha)
        <tr>
            <td>{{$ficha->descricao}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

 </x-app-layout>