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
 @endphp



<form action="{{route('add-ficha')}}" method="POST">
            @csrf


            <div>
                <x-label for="titulo" :value="__('Titulo do treino')" />

                <x-input id="titulo" class="block mt-1 w-full"  type="text" name="titulo" :value="old('titulo')" required autofocus />
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
                <x-label for="situacao" :value="__('Situação da ficha')" />

                <x-input id="situacao" class="block mt-1 w-full" type="text" name="situacao" :value="old('situacao')" required/>
            </div>

             <div>
                <x-label for="tipo_de_treino" :value="__('Tipo de treino')" />

                <x-input id="tipo_de_treino" class="block mt-1 w-full" type="text" name="tipo_de_treino" :value="old('tipo_de_treino')" required/>
            </div>

             <div>

                <x-input id="user_professor" class="block mt-1 w-full" type="hidden" name="user_professor" value="{{Auth::user()->name}}"/>
            </div>

           <x-button class="ml-4" type="submit">
                    {{ __('Salvar') }}
                </x-button>
        </form>



<div class="flex items-center justify-end mt-4" x-data="{add_modal:false}">
    <div @click="add_modal=true">
         <x-button class="ml-4" >Adicionar exercicio</x-button>
    </div>
    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="add_modal">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  
    <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

<b>
    <h1>Cadastro de exercicio</h1>
</b>
<form action="{{route('add-exercicio')}}" method="POST">
            @csrf

            <div>
                <x-label :value="__('Exercico ou equipamento')" />
                <select name="equipamento" id="equipamento">
                 <option disabled>Selecione</option>
                @foreach ($equipamentos as $equipamento)
                
                   
                    <option :value="equipamento">{{$equipamento->name}}</option>
                
                @endforeach
                </select>
            </div>

            <div>
                <x-label for="descricao" :value="__('descricao')" />

                <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required/>
            </div>


            <div>
                <x-label for="serie" :value="__('serie')" />

                <x-input id="serie" class="block mt-1 w-full"  type="text" name="serie" :value="old('serie')" required/>
            </div>

             <div class="mt-4">
                <x-label for="repeticao" :value="__('repeticao')" />

                <x-input id="repeticao" class="block mt-1 w-full" placeholder="Ex: 53152152" type="text" name="repeticao" :value="old('repeticao')" required />
            </div>

            <div>
                <x-label for="descanso" :value="__('Tempo de descanso')" />

                <x-input id="descanso" class="block mt-1 w-full" type="text" name="descanso" :value="old('descanso')" required/>
            </div>

             <div>
                <x-label for="observacao" :value="__('Observacao')" />

                <x-input id="observacao" class="block mt-1 w-full" type="text" name="observacao" :value="old('observacao')" required/>
            </div>

             <div>
                <x-label for="tipo_de_treino" :value="__('Tipo de treino')" />

                <x-input id="tipo_de_treino" class="block mt-1 w-full" type="text" name="tipo_de_treino" :value="old('tipo_de_treino')" required/>
            </div>


             <div class="flex items-center justify-end mt-4">
                 <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('add-ficha') }}">
                    {{ __('Cancelar') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Registre-se') }}
                </x-button>
            </div>

        </form>
      
    </div>
  </div>
</div>     
</div>
</div>
</x-app-layout>
