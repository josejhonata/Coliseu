<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(4)->create(['tipo'=>'atendente']);
         \App\Models\User::factory(4)->create(['tipo'=>'cliente']);
          \App\Models\User::factory(4)->create(['tipo'=>'professor']);


        $this->Call([
            FichaTreinoSeeder::class,
        ]);
    }
}
