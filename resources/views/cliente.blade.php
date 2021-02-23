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

            <p class="text-lg text-center font-bold m-5">Todos os Equipamentos</p>
            <table class="rounded-t-lg m-5 w-1/6 mx-auto bg-gray-800 text-gray-200">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">Descrição</th>
            </tr>
               
            <!-- each row -->
            <tr class="bg-gray-700 border-b border-gray-600">
                @foreach ($fichas as $ficha)
                <tr>
                    <td>{{$ficha->descricao}}</td>
                </tr>               
            </tr>              
            @endforeach
            </table>

 </x-app-layout>