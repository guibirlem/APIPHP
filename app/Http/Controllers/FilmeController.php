<?php
namespace App\Http\Controllers;

use App\Models\Filme;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Validator;

class FilmeController extends Controller 
{
    public function salvar (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'diretor' => 'required|string|max:150',
            'ano' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $filme = Filme::create($request->all());
        return ApiResponse::ok('Filme salvo com sucesso', $filme);
    }

    public function listar()
    {
        $filmes = Filme::all();
        return ApiResponse::ok('Lista de Filmes', $filmes);
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'diretor' => 'required|string|max:150',
            'ano' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $filme = Filme::findOrFail($id);
        $filme->update($request->all());

        return ApiResponse::ok('Alteração feita com sucesso', $filme);
    }

    public function listarPeloId(int $id)
    {
        $filme = Filme::findOrFail($id);
        return ApiResponse::ok('Filme do ID', $filme);
    }

    public function excluir(int $id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return ApiResponse::ok('Filme deletado com sucesso', $filme);
    }
}

