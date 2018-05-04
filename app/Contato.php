<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function lista(){
        return (object) [
            'nome' => 'Steve',
            'telefone' => '(11) 93941-5423'
        ];
    }
}
