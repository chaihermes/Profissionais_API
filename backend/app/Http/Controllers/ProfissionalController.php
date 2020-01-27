<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissional;
use App\Tecnologia;

class ProfissionalController extends Controller
{
    public function listarProfissionais(Request $request){
        //$listaProfissionais = Profissional::all();
        
        //está buscando o id 16 
        $listaProfissionais = Profissional::find(20);

        //o response recebe todas as informações e retorna um json com a lista de profissionais.
        //esse return cria uma API.
        return response()->json($listaProfissionais->tecnologias);
    }

    public function criarProfisional(Request $request){
        //buscando o ID da tecnologia
        $tecnologiaId = $request->tecnologia;
        $tecnologia = Tecnologia::find($tecnologiaId);

        $newProfissional = new Profissional();
        $newProfissional->nome = $request->nome;
        $newProfissional->github = $request->github;
        $result = $newProfissional->save();

        //validando se a tecnologia existe ou não:
        if($tecnologia){
            //com o ID da tecnologia, usa a função de relação com profissionais e agrega a tecnologia com o profissional indicado pelo ID.
            $tecnologia->profissionais()->attach($newProfissional->id);
        } else {
            //tratativas de erro de uma API. Se a tecnologia não existir:
            return response()->json(["error"=>"O id da tecnologia não existe."]);
        }

        //no return exibe todas as informações do usuário que foram cadastradas.
        return response()->json($newProfissional);


    }
}
