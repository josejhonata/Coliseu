<?php

namespace Database\Seeders;

use App\Models\Ficha_treino;
use App\Models\equipamento;
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

        $ficha_treino = Ficha_treino::all();

        foreach ($ficha_treino as $Ficha_treino) {
            # code...
            Ficha_treino::factory(10)->create([
                'ficha_treinos' => $ficha_treino->id
            ]);
        }

    }
}
