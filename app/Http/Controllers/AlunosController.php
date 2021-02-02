<?php

namespace App\Http\Controllers;

use App\Models\alunos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunosController extends Controller
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
            'cpf' => 'required',
            'cep' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Alunos::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'cep' => $request->cep,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function show(alunos $alunos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function edit(alunos $alunos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alunos $alunos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function destroy(alunos $alunos)
    {
        //
    }
}
