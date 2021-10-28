<?php

namespace App\Http\Controllers;

use App\Models\Recado;
use Illuminate\Http\Request;

class RecadosController extends Controller
{
    // função para retornar a página onde os recados aparecerão
    public function index()
    {
        // pegando os recados ordenados pelo maior id até o menor
        $recados = Recado::orderBy('id', 'asc')->get();
        // retornando para view index
        return view('recados.index', ['recados' => $recados, 'pagina' => 'recados']);
    }

    // função para mandar para página de criação de recado 
    public function create()
    {
        // retornando para view 
        return view('recados.create', ['pagina' => 'recados']);
    }

    // função para inserir recado 
    public function insert(Request $form)
    {
        // adicionando nome e comentário do recado 
        $rec = new Recado;
        $rec->nome = $form->nome;
        $rec->comentario = $form->comentario;

        // salvando recado 
        $rec->save();

        // redirecionando para página onde os recados aparecem 
        return redirect()->route('recados.index');
    }

    //mandar recado selecionado para a view de edição
    public function edit(Recado $rec)
    {
        // retornando para view
        return view('recados.edit', ['rec' => $rec, 'pagina' => 'recados']);
    }

    // salva as alterações do usuário
    public function update(Request $form, Recado $rec)
    {
        // mudando alterações
        $rec->nome = $form->nome;
        $rec->comentario = $form->comentario;

        // salvando-as
        $rec->save();
        // redirecionando para rota
        return redirect()->route('recados.index');
    }

    // função que redireciona para página de confirmação de ação
    public function remove(Recado $rec)
    {
        // redireciona para view 
        return view('recados.remove', ['rec' => $rec, 'pagina' => 'recados']);
    }

    // função que deleta o comentário
    public function delete(Recado $rec)
    {
        // deletando
        $rec->delete();

        // redireciona para página de recados
        return redirect()->route('recados.index');
    }
}
