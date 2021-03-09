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

$id= request()->route()->parameters['equipamento'];

$equipamentos=App\Models\equipamento::find($id);

 @endphp


        <div class="text:center">

            <b>
                <h1 class="flex items-center justify-center mt-8" >Cadastro de Equipamento</h1>
            </b>
        </div>
        <form action="{{route('update-equipamento',$id)}}" method="POST">
            @method('PUT')
            @csrf

            <div class="flex items-center justify-center mt-4">
            <div class="justify-items-center">
                <x-label for="name" :value="__('Nome do Equipamento')" />

                <x-input id="name" class="block mt-1 w-9/12"  type="text" name="name" value="{{$equipamentos->name}}" required autofocus />
            </div>

            <div>
                <x-label for="descricao" :value="__('Descrição do Equipamento')" />

                <x-input id="descricao" class="block mt-1 w-9/12" type="text" name="descricao" value="{{$equipamentos->descricao}}" required/>
            </div>

            </div>
             <div class="flex items-center justify-center mt-4">
                 <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Cancelar') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Registre') }}
                </x-button>
            </div>

        </form>

</x-app-layout>