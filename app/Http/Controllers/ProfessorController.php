<?php

namespace App\Http\Controllers;

use App\Models\professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller
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
            'telefone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Professor::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),

        ]);

        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, professor $professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(professor $professor)
    {
        //
    }
}
