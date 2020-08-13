<?php

namespace App\Http\Controllers;

use App\User;
use App\Produto;
use App\PedidoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class NavigateController extends Controller
{
    public function index() {
        return view('index');
    }

    // LOGIN DO USUÁRIO
    public function loginDirect() {
        if(Auth::check()===true){
            return redirect()->route('user.minha-conta');
        }
        return view('user.login');
    }

    public function login(Request $request) {

        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($credentials)){
            return redirect()->route('user.minha-conta');

        }
        return redirect()->back()->withInput()->withErrors(['Oops, os dados estão incorretos. Tente novamente!']);
    }

    // PÁGINA DE REDIRECIONAMENTO SE USUÁRIO NÃO ESTIVER LOGADO
    public function loginForm() {

        if(Auth::check()===true) {
            return view('user.minha-conta');
        }
        return redirect()->route('user.login');
    }

    public function minhaConta() {
        if(Auth::check()===true) {
        return view('user.minha-conta');
        }
    }

    public function meusPedidos() {
        if(Auth::check()===true) {
            $users = User::all();
            return view('user.meus-pedidos')->with('users', $users);
        }
        return redirect()->route('user.login');
    }

    // EDITANDO CONTA - ACESSO USUÁRIO
    public function update(Request $request, $id) {

        $user = User::find($id);

        $user->nome = $request->inputNome;
        $user->endereco = $request->inputEndereco;
        $user->cep = $request->inputCep;
        $user->cidade = $request->inputCidade;
        $user->uf = $request->inputUF;
        $user->email = $request->inputEmail;
        $user->password = Hash::make($request->inputSenha);

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user->email = $request->inputEmail;
        }

        if(!empty($request->inputSenha)) {
            $request->validate([

                'inputSenha'=> 'min:6',
                'inputConfirma'=> 'same:inputSenha|min:6',
            ]);

            $user->password = Hash::make($request->inputSenha);
        }

        $user->update();

        return redirect()->route('user.minha-conta', ['success' => 'Usuário alterado com sucesso!']);
    }

    // LOGOUT USUÁRIO
    public function logoutUser() {
        Auth::logout();
        return redirect()->route('user.login');
    }

}
