<?php
namespace App\Services;

use App\Repositories\CidadeRepository;
class CidadeServices{
    protected $repo;
    public function __construct(CidadeRepository $repo){
        $this->repo = $repo;
    }
    public function getAll(){
        return $this->repo->getAll();
    }
    public function validCidadeEstado(array $cidade){
        return $this->repo->validCidadeEstado($cidade);
    }
}

?>