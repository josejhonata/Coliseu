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
</style>
<x-app-layout>

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coliseu') }}
        </h2>
    </x-slot>

@php
$fichas=App\Models\Ficha_treino::where('user_name',Auth::user()->name)->get();
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