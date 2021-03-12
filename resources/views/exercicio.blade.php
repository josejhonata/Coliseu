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
                                    
$id= request()->route()->parameters['exer'];
$fichas=App\Models\Ficha_treino::where('id', $id)->get();
$equipamentos=App\Models\equipamento::where('descricao','Funcionando')->get();
@endphp 



<center>
    <thead>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <tr style="background: #131313; color :white;">
                <th>Titulo</th>
                <th>Tipo de treino</th>
                <th>Nome do aluno</th>
                <th>Stuação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($fichas as $ficha)
            <tr>
                <td>{{$ficha->titulo}}</td>
                <td>{{$ficha->tipo_de_treino}}</td>
                <td>{{$ficha->user_name}}</td>
                <td>{{$ficha->situacao}}</td>
            </tr>

            @endforeach

        </tbody>
    </table>
</center>
 
<b>
    <h1>Cadastro de exercicio</h1>
</b>

<form action="{{route('add-exercicio')}}" method="POST">
            @csrf

            
             <div>
                <x-label :value="__('Selecione o equipamento')" />
                
                <select name="equipamento" id="equipamento">
                    <option disabled>Selecione</option>
                    @foreach ($equipamentos as $equipament)
                    <option :value="equipamento">{{$equipament->name}}</option>
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
    
                <x-input id="id_ficha" class="block mt-1 w-full" type="hidden" name="id_ficha" value="{{$id}}"/>
            </div>

                <x-button class="ml-4">
                    {{ __('Salvar') }}
                </x-button>
            </div>

        </form>

 </x-app-layout>


