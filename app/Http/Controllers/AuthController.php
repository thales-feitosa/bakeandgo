<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // PÁGINA DE REDIRECIONAMENTO SE O USUÁRIO NÃO ESTIVER LOGADO
    public function manager() {
        if(Auth::check()===true) {
            $users = User::all();
            $users = User::paginate(10);
            if(Auth::user()->admin==1) {
                return view('admin.adm-usuario')->with('users', $users);
            }
        }
        return redirect()->route('admin.login');
    }

    // LOGIN ADMINISTRATIVO
    public function showLoginForm() {
        if(Auth::check()===true) {
            $users = User::all();
            $users = User::paginate(10);
            if(Auth::user()->admin==1) {
                return view('admin.adm-usuario')->with('users', $users);
            }
        }         
        return view('admin.formLogin');
    }
    
    public function login(Request $request) {
        
        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($credentials)) {
            if(Auth::user()->admin==1) {
                return redirect()->route('adm-usuario');
                }
            }
            return redirect()->back()->withInput()->withErrors(['email'=>'Oops, apenas funcionários da Bake & Go tem acesso a esta página.']);
    }

    // LOGOUT ADMINISTRATIVO
    public function logout() {
        Auth::logout();
        return redirect()->route('admin');
    }

    // TORNAR UM USUÁRIO ADMINISTRADOR
    public function toggleAdmin(Request $request, $id) {
        
        $user = User::find($id);
        $user->admin = $request->admin;
        $user->update();

        return redirect()->route('adm-usuario');
    }
}
