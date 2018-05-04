<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contato;

class ContatoController extends Controller
{
    //

    public function index(){
        //return "Teste de controller (ContatoController@index) ";
        $contatos = [
            (object)['nome' => 'Michone', 'telefone' => '(11) 91234-1234'],
            (object)['nome' => 'Rick', 'telefone' => '(11) 94343-9843'],
            (object)['nome' => 'Daryl', 'telefone' => '(11) 98683-0932'],
            (object)['nome' => 'Steve', 'telefone' => '(11) 98989-0953'],
            (object)['nome' => 'Bill', 'telefone' => '(11) 90805-8754']
        ];

        $contato = new Contato();
        dd($contato->lista());

        //return view('contato.index', ['dados'=>$contatos]);
        return view('contato.index', compact('contatos'));
    }

    public function criar(Request $req){
        //return "Teste de controller (ContatoController@criar) ";
        //dd($req);
        //dd($req->all());
        dd($req['id']);
    }

    public function editar(){
        return "Teste de controller (ContatoController@editar) ";
    }
}
