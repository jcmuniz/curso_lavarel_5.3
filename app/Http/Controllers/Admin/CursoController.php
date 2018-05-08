<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $registros = Curso::all();
        return view('admin.cursos.index', compact('registros'));
    }
    public function adicionar()
    {
        return view('admin.cursos.adicionar');
    }
    public function salvar(Request $req)
    {
        $dados = $req->all();
        if($req->hasFile('imagem'))
        {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = 'img/cursos';
            $ext = $imagem->guessClientExtension();
            $nomeImagem = 'imagem_'.$num.'.'.$ext;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir.'/'.$nomeImagem;
        }
        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }
        Curso::create($dados);

        return redirect()->route('admin.cursos');
    }
    public function editar($id)
    {
        $registro = Curso::find($id);
        return view('admin.cursos.editar', compact('registro'));
    }
    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        $registro = Curso::find($id);
        if($req->hasFile('imagem'))
        {
            if(!empty($registro->imagem) && file_exists($registro->imagem)){
                unlink($registro->imagem);
            }
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = 'img/cursos';
            $ext = $imagem->guessClientExtension();
            $nomeImagem = 'imagem_'.$num.'.'.$ext;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir.'/'.$nomeImagem;
        }
        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }
        $registro->update($dados);

        return redirect()->route('admin.cursos');
    }
    public function deletar($id)
    {
        $registro = Curso::find($id);
        if(!empty($registro->imagem) && file_exists($registro->imagem)){
            unlink($registro->imagem);
        }
        $registro->delete();
        return redirect()->route('admin.cursos');
    }
}
