<?php

namespace App\Http\Controllers;

use App\Models\equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
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
            'name' => 'required',
            'descricao' => 'required',
        ]);

        Equipamento::create([
            'name' => $request->name,
            'descricao' => $request->descricao,
        ]);

        return view('cadastroequipamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(equipamento $equipamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function edit(equipamento $equipamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipamento $equipamento)
    {
        $equipamento->update([
            'name' => $request->name,
            'descricao' => $request->descricao,
        ]);

        return view('cadastroequipamento');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipamento $equipamento)
    {
        $equipamento->delete();
        return view('cadastroequipamento');
    }
}
