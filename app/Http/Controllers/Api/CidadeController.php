<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\{CidadeStore,CidadeUpdate};
use Illuminate\Http\Request;
use App\Models\{Cidade,Estado};
use Illuminate\Support\Facades\{DB,Validator};
use App\Services\CidadeServices;



class CidadeController extends Controller
{
    private $services;
    private $cidade;
    private $estado;
    public function __construct(CidadeServices $services,Cidade $cidade,Estado $estado)
    {
        $this->services = $services;
        $this->cidade = $cidade;
        
        $this->estado = $estado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rows = $this->services->getAll();
        return response()->json($rows);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeStore $req)
    {
        // dd($req->validated()['estado']);
            $isExists = Estado::where("nome" ,"=",$req->validated()['estado'] );
            if($isExists->exists()){

                $cidadeExis = $this->cidade::
                 where("estado_id","=", $isExists->first()->id)
                ->where("nome","=", $req->validated()['cidade'])
                ->select("cidades.nome as cidadenome", "estado_id");

                if($cidadeExis->exists()){ 
                    return response()->json(["erro"=> "estado já tem essa cidade"]);
                }
                        $this->cidade::create([
                            "nome" => $req->cidade,
                            "estado_id" => $isExists->first()->id
                        ]);
                        return response()->json(["sucess"=>  "cadastro realizado com sucesso"],201);
            }
                
                $idEstado =$this->estado::insertGetId(
                    ['nome' => $req->validated()['estado']]
                );
                
                $this->cidade::create([
                    "nome" => $req->validated()['cidade'],
                    "estado_id" => $idEstado
                ]);

                return response()->json(["sucess"=>  "cadastro realizado com sucesso"],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
            $rows =Estado::join("cidades as c","estados.id","=","c.estado_id")
            ->where("estados.id",$id);

            // dd($rows);
            if(!$rows->first()){
                return response()->json(["erro"=>"Estado nao encontrado",404]);

            }
        
            return response()->json(["sucess"=> "Retornado", "Data" => $rows->select("estados.id as id_estado","estados.nome as estado_nome","c.nome as nome_cidade")
            ->paginate(10)],200);
        
     

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeUpdate $req, $id)
    {
       
        $statesExists = $this->cidade
        ->join('estados', 'estados.id', '=', 'cidades.estado_id')->where("cidades.id", "=" ,$id)
        ->select( 'cidades.id','cidades.nome', 'estados.id as estadoid','estados.nome as estadonome');

            if($statesExists->exists()){

                $this->cidade::where("id","=",$id)->update(['nome' => $req->cidade],$id);
                return response()->json(["sucess" => "Alterado com sucesso"]);

            }

            return response()->json(["erro" => "cidade nao existe"],422);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function isExists($id,Request $req){

            $rows = $this->cidade::where("nome",$id)->first();
            if($rows){
                return response()->json(["sucess"=>"Retornado" ,"Data"=>"A cidade ".$rows->nome." existe"]);
            }
            return response()->json(["erro"=>"Retornado" ,"Data"=>"Verifique a cidade informada"],422);
            
        
    }
}
