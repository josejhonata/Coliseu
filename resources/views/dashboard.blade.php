
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

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

<style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
@import url(https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css);
</style>

    <div class=" bg-white-900 flex items-center justify-center px-5 py-5">
    <div class="bg-gray-800 text-gray-500 rounded shadow-xl py-3 px-3 w-full lg:w-1/2" x-data="{chartData:chartData()}" x-init="chartData.fetch()">
        <h1>Relatório  Financeiro</h1>
        <div class="flex flex-wrap items-end">
            <div class="flex-1">
                <h3 class="text-lg font-semibold leading-tight">Arrecadação</h3>
            </div>
            <div class="relative" @click.away="chartData.showDropdown=false">
                <button class="text-xs hover:text-gray-300 h-6 focus:outline-none" @click="chartData.showDropdown=!chartData.showDropdown">
                    <span x-text="chartData.options[chartData.selectedOption].label"></span><i class="ml-1 mdi mdi-chevron-down"></i>
                </button>
                <div class="bg-gray-700 shadow-lg rounded text-sm absolute top-auto right-0 min-w-full w-32 z-30 mt-1 -mr-3" x-show="chartData.showDropdown" style="display: none;" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                    <span class="absolute top-0 right-0 w-3 h-3 bg-gray-700 transform rotate-45 -mt-1 mr-3"></span>
                    <div class="bg-gray-700 rounded w-full relative z-10 py-1">
                        <ul class="list-reset text-xs">
                            <template x-for="(item,index) in chartData.options">
                                <li class="px-4 py-2 hover:bg-gray-600 hover:text-white transition-colors duration-100 cursor-pointer" :class="{'text-white':index==chartData.selectedOption}" @click="chartData.selectOption(index);chartData.showDropdown=false">
                                    <span x-text="item.label"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-end mb-5">
            <h4 class="text-2xl lg:text-3xl text-white font-semibold leading-tight inline-block mr-2" x-text="'$'+(chartData.data?chartData.data[chartData.date].total.comma_formatter():0)">0</h4>
            <span class="inline-block" :class="chartData.data&&chartData.data[chartData.date].upDown<0?'text-red-500':'text-green-500'"><span x-text="chartData.data&&chartData.data[chartData.date].upDown<0?'▼':'▲'">0</span> <span x-text="chartData.data?chartData.data[chartData.date].upDown:0">0</span>%</span>
        </div>
        <div>
            <canvas id="chart" class="w-full"></canvas>
        </div>
    </div>
</div>
</x-app-layout>
        <div>

            <script>
                Number.prototype.comma_formatter = function() {
                    return this.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                }
                
                let chartData = function(){
                    return {
                        date: 'today',
                        options: [
                            {
                                label: 'Hoje',
                                value: 'today',
                            },
                            {
                                label: 'Últimos 7 Dias',
                                value: '7days',
                            },
                            {
                                label: 'Últimos 30 Dias',
                                value: '30days',
                            },
                            {
                                label: 'Últimos 6 Meses',
                        value: '6months',
                    },
                    {
                        label: 'Este Ano',
                        value: 'year',
                    },
                ],
                showDropdown: false,
                selectedOption: 0,
                selectOption: function(index){
                    this.selectedOption = index;
                    this.date = this.options[index].value;
                    this.renderChart();
                },
                data: null,
                fetch: function(){
                    fetch('https://cdn.jsdelivr.net/gh/swindon/fake-api@master/tailwindAlpineJsChartJsEx1.json')
                    .then(res => res.json())
                    .then(res => {
                        this.data = res.dates;
                        this.renderChart();
                    })
                },
                renderChart: function(){
                    let c = false;
                    
                    Chart.helpers.each(Chart.instances, function(instance) {
                        if (instance.chart.canvas.id == 'chart') {
                            c = instance;
                        }
                    });

                    if(c) {
                        c.destroy();
                    }
                    
                    let ctx = document.getElementById('chart').getContext('2d');

                    let chart = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: this.data[this.date].data.labels,
                            datasets: [
                                {
                                    label: "Valor Arrecadado",
                                    backgroundColor: "rgba(102, 126, 234, 0.25)",
                                    borderColor: "rgba(102, 126, 234, 1)",
                                    pointBackgroundColor: "rgba(102, 126, 234, 1)",
                                    data: this.data[this.date].data.income,
                                },
                                {
                                    label: "Alunos inscritos",
                                    backgroundColor: "rgba(237, 100, 166, 0.25)",
                                    borderColor: "rgba(237, 100, 166, 1)",
                                    pointBackgroundColor: "rgba(237, 100, 166, 1)",
                                    data: this.data[this.date].data.expenses,
                                },
                            ],
                        },
                        layout: {
                            padding: {
                                right: 10
                            }
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        callback: function(value,index,array) {
                                            return value > 1000 ? ((value < 10000) ? value/1000 + 'K' : value/10000 + 'K') : value;
                                        }
                                    }
                                }]
                            }
                        }
                    });
                }
            }
        }
        </script>
        </div>



