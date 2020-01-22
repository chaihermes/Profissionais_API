<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissional;
use App\Tecnologia;

class ProfissionalController extends Controller
{
    public function listarProfissionais(Request $request){
        $listaProfissionais = Profissional::all();

        //o response recebe todas as informações e retorna um json com a lista de profissionais.
        //esse return cria uma API.
        return response()->json($listaProfissionais);
    }

    public function criarProfisional(Request $request){
        $newProfissional = new Profissional();
        $newProfissional->nome = $request->nome;
        $newProfissional->github = $request->github;

        $result = $newProfissional->save();

        //no return exibe todas as informações do usuário que foram cadastradas.
        return response()->json($newProfissional);
    }
}
