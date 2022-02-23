<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CidadeRepository;
use App\Http\Requests\PessoaStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator,Http};
use App\Models\{Pessoas,Cidade};

class PessoaController extends Controller
{   
    private $pessoas;
    private $repositories;
    public function __construct(CidadeRepository $repositories, Pessoas $pessoas)
    {
        $this->repositories = $repositories;
        $this->pessoas = $pessoas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(PessoaStore $req)
    {
        
        $rows =$this->repositories->validCidadeEstado(
        [
        'estado'=>$req->estado,
        'cidade'=>$req->cidade
        ]);
        
        // dd($req->nome,$req->cpf,$req->estado,$req->cidade);
        if($rows->exists()){
            $this->pessoas::create([
                "nome" => $req->nome,
                "cpf" => $req->cpf,
                "estado" => $req->estado,
                "cidade" => $req->cidade
            ]);
            return response()->json(["sucess"=>"cadastrado com sucesso"],201);

        }

        return response()->json(["erro"=>"Estado ou Cidade não existente"],422);


    }

    
    

}
