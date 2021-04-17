<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listaCadastra(Request $request)
    {
        $data = [];
        if ($request->isMethod("POST")) {
            $filme = new Filme($request->all());

            //Gravar no banco
            try {
                $filme->save();
                $data["success"] = "Filme salvo com sucesso!";
            } catch (QueryException $ex) {
                $data["error"] = "Ocorreu um erro no cadastro do filme. <br>$ex";
            }
        }
        $data["categorias"] = Categoria::all();
        $data["filmes"] = Filme::all();
        return view('filmes/index', $data);
    }
}