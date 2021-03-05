
<x-app-layout>
     <x-slot name="header">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="68">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-900 hover:text-gray-900 hover:border-gray-900 focus:outline-none focus:text-gray-900 focus:border-gray-900 transition duration-150 ease-in-out">
                            <div>Olá, {{ Auth::user()->name }}</div>

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



        <center>
            <a href="atendente/cadastroaluno"  class="bg-green-200 hover:bg--700 text-white font-bold py-2 px-4 rounded">Cadastrar Aluno</a>

            <a href="atendente/cadastroprofessor" class="bg-green-200 hover:bg--700 text-white font-bold py-2 px-4 rounded">Cadastrar Professor</a>
            
            
            <a href="atendente/cadastroequipamento" class="bg-green-200 hover:bg--700 text-white font-bold py-2 px-4 rounded" >Cadastrar Equipamento</a>    
        </center>
    </x-slot>
</x-app-layout>



