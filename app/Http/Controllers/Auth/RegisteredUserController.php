<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $utipo = $request->tipo;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
             'cpf' => 'required',
             'cep' => 'required',
             'username' => 'required',
             'tipo' => 'required',
            'password' => 'required|string|confirmed|min:8',
            
           
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'cep' => $request->cep,
            'username'=> $request->username,
            'tipo' => $request->tipo,
            'password' => Hash::make($request->password),
            
            
        ]));

        if ($utipo == "cliente") {
            return redirect('/atendente/cadastroaluno');
        }else{
            return redirect('/atendente/cadastroprofessor');
        }
        


    }


    public function update(Request $request, User $User)
    {
        $User->update([

            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'cep' => $request->cep,
            'username'=> $request->username,
            'tipo' => $request->tipo,

        ]);

        return redirect('dashboard');
    }

    public function destroy(User $User)
    {
        $User->delete();
        return redirect('/dashboard');
    }
}
