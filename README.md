# APIPHP
teste de uma API em php feita usando o imsonia composer e laravel 


abrir uma pasta com o git bash 
laravel n 
nome do projeto
NONE
PHPUNIT
no repository

***Autoload running***

SQLITE
yes
cd nome do projeto
code . para abrir a pasta para codar
no terminal = php artisan install:api 
php artisan make : controller
PostController

php artisan make:model (NOME DO TIPO AQUI *FILMES POST ETC* -m


*navegar dentro das pastas database > migrations > arquivo > (ultima tabela a esqueda que é onde cria as tables*
dentro do arquivo com a tabelta iremos colocar os campos que o desafio esta pedindo, exemplo
$table -> string ('titulo',200);
 $table->integer('ano');


DEPOIS DISSO DAR O COMANDO
php artisan migrate
é muito importante porque dai a table ira ser gerada e vai estar funcional *caso contrário o imsonia NAO irá funcionar e nao achara a database


ir app > models > post(ou outro nome).php
protected $fillable = [ 'diretor', 'titulo', 'ano' ];

depois 

app http controllers postcontroller.php
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

(como ficou no codigo , fazer alteraçoes necessarias caso )

agora routes api.php

botar ROTAS serao usadas no imsonia
Route::get('/filme', [FilmeController::class,'listar']);
Route::post('/filme', [FilmeController::class,'salvar']);
Route::put('/filme/{id}', [FilmeController::class,'editar']);
Route::delete('/filme/{id}', [FilmeController::class,'excluir']);
Route::get('/filme/{id}', [FilmeController::class,'listarPeloId']);



no imsonia fazer um arquivo nome e mudar os endpoints
(lembrando que o post e meio padrão, nesse caso foi Filmes)
DEL-deletarPost
POST-editarPost
Put-SalvarPost
GET-getPost

_.url/api/post
no body de put e post fazer o json manualmente
{
"titulo":"qualquer"
"ano":"2000",
"diretor": "qualquer"
}

depois testar owo yay
