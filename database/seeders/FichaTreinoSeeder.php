<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FichaTreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ficha_treino::factory(10)->create();
    }
}
