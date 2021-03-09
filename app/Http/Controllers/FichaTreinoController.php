<?php

namespace App\Http\Controllers;

use App\Models\Ficha_treino;
use Illuminate\Http\Request;

class FichaTreinoController extends Controller
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


        $request->validate([
            'titulo' => 'required',
            'data_inicio' => 'required',
            'data_final' => 'required',
            'user_name' => 'required',
            'situacao' => 'required',
            'tipo_de_treino' => 'required',
            'user_professor' => 'required',
        ]);
        
        

        Ficha_treino::create([
            'titulo' => $request->titulo,
            'data_inicio' => $request->data_inicio,
            'data_final' => $request->data_final,
            'user_name' => $request->user_name,
            'situacao' => $request->situacao,
            'tipo_de_treino' => $request->tipo_de_treino,
            'user_professor' => $request->user_professor,
        ]);

        
        return redirect('/cadastroexercicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha_treino  $ficha_treino
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha_treino $ficha_treino)
    {
        return view('visualizarficha');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha_treino  $ficha_treino
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha_treino $ficha_treino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha_treino  $ficha_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ficha_treino $ficha_treino)
    {
        $ficha_treino->update([

            'titulo' => $request->titulo,
            'data_inicio' => $request->data_inicio,
            'data_final' => $request->data_final,
            'user_name' => $request->user_name,
            'situacao' => $request->situacao,
            'tipo_de_treino' => $request->tipo_de_treino,
            'user_professor' => $request->user_professor,

        ]);

        return redirect('professor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha_treino  $ficha_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha_treino $ficha_treino)
    {
        $ficha_treino->delete();
        return redirect('/professor');
    }
}
