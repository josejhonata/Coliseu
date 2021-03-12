<?php

namespace App\Http\Controllers;

use App\Models\exercicio;
use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $exer= $request->id_ficha;
       
        $request->validate([
            'equipamento'=> 'required',
            'descricao' => 'required',
            'serie' => 'required',
            'repeticao' => 'required',
            'descanso' => 'required',
            'observacao' => 'required',
            'id_ficha' => 'required',
        ]);

        Exercicio::create([
            'equipamento' => $request->equipamento,
            'descricao' => $request->descricao,
            'serie' => $request->serie,
            'repeticao' => $request->repeticao,
            'descanso' =>  $request->descanso,
            'observacao' => $request->observacao,
            'id_ficha' => $request->id_ficha,
        ]);

        
        return redirect('/professor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function show(exercicio $exercicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function edit(exercicio $exercicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exercicio $exercicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(exercicio $exercicio)
    {
        $exercicio->delete();
        return route('cadastroficha');
    }
}
