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
            'descricao' => 'required',
            'user_id' => 'required',
        ]);

        Ficha_treino::create([
            'descricao' => $request->descricao,
            'user_id' => $request->user_id,
        ]);

        return redirect('/professor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha_treino  $ficha_treino
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha_treino $ficha_treino)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha_treino  $ficha_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha_treino $ficha_treino)
    {
        //
    }
}
