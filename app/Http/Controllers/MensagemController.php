<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MensagemController extends Controller
{
    // LISTANDO AS MENSAGENS
    public function listMessage() {

        if(Auth::check()===true) {
            if(Auth::user()->admin==1) {
                $messages = DB::table('mensagens');
                $found = $messages->count();
                $messages = $messages->paginate(10);
        
                return view('admin.adm-mensagem')->with(['messages'=>$messages, 'found'=>$found]);
            }
        }
        return redirect()->route('admin.login');
    }

    // ACESSO A PÁGINA DE CONTATO
    public function pagContato() {
        return view('contato');
    }

    // ENVIANDO MENSAGEM
    public function sendMessage(Request $request) {

        $request->validate([
            'inputMensagem'=> 'required|min:10'
        ]);

        $message = new Mensagem;

        $message->nome = $request->inputNome;
        $message->email = $request->inputEmail;
        $message->mensagem = $request->inputMensagem;

        $message->save();

        if($message){
            return redirect()->route('contato', ['success' => 'Mensagem enviada! Em breve responderemos.']);
        }
    }

    // DELETANDO MENSAGEM
    public function deleteMessage($id) {
        $message = Mensagem::find($id);

        if($message->delete()) {
   
            return redirect()->route('mensagens.listAll', ['success' => 'Mensagem excluída com sucesso!']);
        }
    }
}
