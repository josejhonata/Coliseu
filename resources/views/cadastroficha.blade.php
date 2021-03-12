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
 $alunos=App\Models\User::where('tipo','cliente')->get();
 $equipamentos=App\Models\equipamento::all();
 $exercicios=App\Models\exercicio::all();
 @endphp



<div class="flex place-content-center pt-10">
<form action="{{route('add-ficha')}}" method="POST">
            @csrf


            <div>
                <x-label for="titulo" :value="__('Titulo do treino')" />

                <x-input id="titulo" class="block mt-3 w-full"  type="text" name="titulo" :value="old('titulo')" required autofocus />
            </div>

            <div>
                <x-label :value="__('Data de inicio')" />

                <x-input id="data_inicio" class="block mt-1 w-full" type="date" name="data_inicio" :value="old('data_inicio')" required/>
            </div>

             <div>
                <x-label :value="__('Data final')" />
                <x-input id="data_final" class="block mt-1 w-full" type="date" name="data_final" :value="old('data_final')" required/>
            </div>

             <div>
                <x-label :value="__('Selecione o aluno')" />
                
                <select name="user_name" id="user_name">
                    <option disabled>Selecione</option>
                    @foreach ($alunos as $aluno)
                    <option :value="user_name">{{$aluno->name}}</option>
                    @endforeach
                </select>
                
            </div>

             <div>
                
              <x-input id="situacao" class="block mt-1 w-full" type="hidden" name="situacao" :value="'ativa'"/>

            </div>

             <div>
                <x-label for="tipo_de_treino" :value="__('Tipo de treino')" />

                <x-input id="tipo_de_treino" class="block mt-1 w-full" type="text" name="tipo_de_treino" :value="old('tipo_de_treino')" required/>
            </div>

             <div>

                <x-input id="user_professor" class="block mt-1 w-full" type="hidden" name="user_professor" value="{{Auth::user()->name}}"/>
            </div>
        <div class="pt-6 pl-64">
          <a href="" >
           <x-button class="" type="submit">
                    {{ __('Salvar') }}
                </x-button>
                </a>
        </form>
        </div>
    </div>
    </div>



 
</x-app-layout>
