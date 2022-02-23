<?php

namespace App\Repositories;

use App\Models\Cidade;

class CidadeRepository{
    protected $entity;

    public function __construct(Cidade $cidade)
    {   
        $this->entity= $cidade;
    }

    public function getAll(){
        return $this->entity->join('estados as e','e.id','=','cidades.estado_id')
        ->select("e.nome as Estado","cidades.nome as Cidade")
        ->get();
    }
    public function validCidadeEstado(array $cidade){
        return $this->entity::join('estados as e','e.id','=','cidades.estado_id')
        ->select("e.nome as Estado","cidades.nome as Cidade")
        ->where("e.nome",$cidade['estado'])
        ->where("cidades.nome",$cidade['cidade']);

    }
}

?>