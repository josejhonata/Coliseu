
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coliseu') }}
        </h2>
        <center>
            <a href="atendente/cadastroaluno"  class="bg-green-200 hover:bg--700 text-white font-bold py-2 px-4 rounded">Cadastrar Aluno</a>

            <a href="atendente/cadastroprofessor" class="bg-green-200 hover:bg--700 text-white font-bold py-2 px-4 rounded">Cadastrar Professor</a>
            
            
            <a href="atendente/cadastroequipamento" class="bg-green-200 hover:bg--700 text-white font-bold py-2 px-4 rounded" >Cadastrar Equipamento</a>    
        </center>
    </x-slot>

    
</x-app-layout>



