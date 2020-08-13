<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    public function tabela() {
        
        if(Auth::check() === true) {
            if(Auth::user()->admin==1) {
            $categorias = Categoria::all();
            $categorias = Categoria::paginate(10);
            return view('/admin/adm-categoria')->with('categorias', $categorias);
            }
            return redirect()->route('admin.login');
        }
    }

    public function create(Request $request) {

        $request->validate([
            'categoria' => 'required'
        ]);

        $categoria = new Categoria;

        $categoria->categoria = $request->categoria;

        $categoria->save();

        if ($categoria) {
            return redirect()->route('adm-categoria', ['success' => 'Categoria criada com sucesso']);
        }
    }

    public function update(Request $request, $id) {

        $request->validate([
            'categoria' => 'required'
        ]);

        $categoria = Categoria::find($id);

        $categoria->categoria = $request->categoria;

        $categoria->update();

        return redirect()->route('adm-categoria', ['success' => 'Categoria alterada com sucesso!']);
    }

    public function delete($id) {

        $categoria = Categoria::find($id);

        if($categoria->delete()){

            return redirect()->route('adm-categoria', ['success' => 'Categoria excluída com sucesso!']);

        };
    }
}
