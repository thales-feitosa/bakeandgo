<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    // CADASTRANDO NOVO USUÁRIO
    public function createPage() {
        return view('cadastro');
    }
    public function createUser(Request $request) {

        $request->validate([
            // 'inputNome' => 'required',
            // 'inputCPF' => 'required',
            // 'inputRG' => 'required',
            // 'inputEndereco' => 'required',
            // 'inputCEP' => 'required',
            // 'inputCidade' => 'required',
            // 'inputUF' => 'required',
            'inputSenha'=> 'required|min:6',
            'inputConfirma'=> 'required|same:inputSenha|min:6'
        ]);

        $password = $request->inputSenha;

        $user = new User;

        $user->nome = $request->inputNome;
        $user->cpf = $request->inputCPF;
        $user->rg = $request->inputRG;
        $user->endereco = $request->inputEndereco;
        $user->cep = $request->inputCep;
        $user->cidade = $request->inputCidade;
        $user->uf = $request->inputUF;
        $user->password = $request->inputSenha;
        $user->email = $request->inputEmail;
        $user->password = Hash::make($request->inputSenha);

        $user->save();

        if($user) {
            $credentials = [
                'email'=> $user->email,
                'password'=> $password
            ];
            if (Auth::attempt($credentials)) {
                return redirect()->route('cadastro', ['success' => 'Cadastro criado com sucesso!']);
            }
            return view('cadastro');
        }
    }

    // LISTANDO USUÁRIOS
    public function listAllUsers() {

        if(Auth::check()===true){
            if(Auth::user()->admin==1) {
                $users = DB::table('users');
                $users = $users->paginate(10);
                return view('admin.adm-usuario')->with('users', $users);
            }
        }
        return redirect()->route('admin.login');
    }

    // EDITANDO USUÁRIOS
    // public function editUser($id) {
    //     $users = User::find($id);

    //     if($users) {
    //         return view('user.minha-conta')->with('users', $users);
    //     }
    // }

    // public function updateUser(Request $request, $id) {

    //     $user = User::find($id);

    //     $user->nome = $request->inputNome;
    //     $user->cpf = $request->inputCPF;
    //     $user->rg = $request->inputRG;
    //     $user->endereco = $request->inputEndereco;
    //     $user->cep = $request->inputCep;
    //     $user->uf = $request->inputUF;
    //     $user->cidade = $request->inputCidade;

    //     if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
    //         $user->email = $request->inputEmail;
    //     }

    //     if(!empty($request->inputSenha)) {
    //         $request->validate([

    //             'inputSenha'=> 'min:6',
    //             'inputConfirma'=> 'same:inputSenha|min:6'
    //         ]);

    //         $user->password = Hash::make($request->inputSenha);
    //     }
    //     $user->update();

    //     if(Auth::user()->admin!=1) {
    //         return view('user.editar-usuario')->with([
    //             'user'=> $user,
    //             'success'=>'Usuário alterado com sucesso!'
    //         ]);

    //     } 
    //     return redirect()->route('user.minha-conta')->with('success', 'Usuário alterado com sucesso!');
    // }

    // DELETANDO USUÁRIOS
    public function deleteUser($id) {
        $user = User::find($id);

        if($user->delete()) {
               
            return redirect()->route('adm-usuario', ['success' => 'Usuário excluído com sucesso!']);

        }
    }  
}