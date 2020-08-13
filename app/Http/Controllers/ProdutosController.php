<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOption\Option;

class ProdutosController extends Controller
{
    public function tabela() {
        
        if(Auth::check() === true) {
            $categorias = Categoria::all();
            $produtos = Produto::all();

            $produtos = Produto::paginate(10);
            
            return view('admin.adm-produto')->with('produtos', $produtos)->with('categorias', $categorias);
        }
        return redirect()->route('admin.login');
    }

    public function create(Request $request) {

        $request->validate([
            'ref' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'unidadeMedida' => 'required',
            'categoria' => 'required'
        ]);

        $image = $request->file('imagem');

        if(empty($image)) {
            $pathRelative = null;
        } else {
            $image->storePublicly('uploads');
            
            $absolutePath = public_path()."/storage/uploads";
            
            $name = $image->getClientOriginalName();

            $image->move($absolutePath, $name);

            $pathRelative = "storage/uploads/$name";
        };

        $produto = new Produto;

        $produto->ref = $request->ref;
        $produto->nome = $request->nome;
        $produto->imagem = $pathRelative;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->unidadeMedida = $request->unidadeMedida;
        $produto->categoria_id = $request->categoria;

        $produto->save();

        if ($produto) {
            return redirect()->route('adm-produto', ['success' => 'Produto criado com sucesso']);
        }
    }

    public function update(Request $request, $id) {

        $request->validate([
            'ref' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'unidadeMedida' => 'required',
            'categoria' => 'required'
        ]);

        $image = $request->file('imagem');

        $produto = Produto::find($id);

        if(empty($image)) {
            $pathRelative = $produto->imagem;
        } else {
            $image->storePublicly('uploads');
            
            $absolutePath = public_path()."/storage/uploads";
            
            $name = $image->getClientOriginalName();

            $image->move($absolutePath, $name);

            $pathRelative = "storage/uploads/$name";
        };

        $produto->ref = $request->ref;
        $produto->nome = $request->nome;
        $produto->imagem = $pathRelative;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->unidadeMedida = $request->unidadeMedida;
        $produto->categoria_id = $request->categoria;

        $produto->update();

        return redirect()->route('adm-produto', ['success' => 'Produto alterado com sucesso!']);
    }

    public function delete($id) {

        $categoria = Produto::find($id);

        if($categoria->delete()){

            return redirect()->route('adm-produto', ['success' => 'Produto excluído com sucesso!']);

        };
    }
}