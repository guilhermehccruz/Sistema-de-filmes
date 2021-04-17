<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index()
    {
        $data["categorias"] = Categoria::all();
        $data["filmes"] = Filme::all();
        return view('index', $data);
    }

    public function listaCadastra(Request $request)
    {
        $data = [];
        if ($request->isMethod("POST")) {
            $filme = new Filme($request->all());
            $acceptedFiles = ['jpeg', 'jpg', 'png'];
            $file = $request->file('cover');
            if (in_array($file->getClientOriginalExtension(), $acceptedFiles)) {
                //Gravar no banco
                try {
                    $filme->save();
                    $data["success"] = "Filme salvo com sucesso!";

                    // Altera o cover para o id do item
                    $id = Filme::getMovieByTitle($filme->title);
                    $fileName = $id . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('images', $fileName);
                    Filme::where('id', $id)->update(array('cover' => $path));
                } catch (QueryException $ex) {
                    $data["error"] = "Erro!";
                }
            } else {
                $data["error"] = "Por favor, selecione apenas arquivos jpeg, jpg ou png.";
            }
        }
        $data["categorias"] = Categoria::all();
        return view('filmes/index', $data);
    }

    public function info(Request $request, $id)
    {
        $data = [];
        if ($request->isMethod("get")) {
            $filme = new Filme();
            $categoria = new Categoria();
            try {
                $data['filme'] = $filme->where('id', $id)->first();
                $idCategoria = $data['filme']->category;
                $data['categoria'] = $categoria->where('id', $idCategoria)->first();
            } catch (QueryException $ex) {
                $data['error'] = "Filme não encontrado";
            }
        }
        return view('filmes/info', $data);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod("get")) {
            $filme = new Filme();
            try {
                $data['filme'] = $filme->where('id', $id)->first();
            } catch (Exception $ex) {
                return redirect('/home');
            }
        }

        if ($request->isMethod("post")) {
            $filme = new Filme();
            $filme->title = $request->title;
            $filme->category = $request->category;
            $filme->synopsis = $request->synopsis;
            $filme->score = $request->score;
            $filme->director = $request->director;
            $filme->release = $request->release;

            DB::table('filmes')
                ->where('id', $id)
                ->update([
                    'title' => $filme->title,
                    'category' => $filme->category,
                    'synopsis' => $filme->synopsis,
                    'score' => $filme->score,
                    'director' => $filme->director,
                    'release' => $filme->release
                ]);

            if ($request->file('cover') !== null) {
                $acceptedFiles = ['jpeg', 'jpg', 'png'];
                $file = $request->file('cover');
                if (in_array($file->getClientOriginalExtension(), $acceptedFiles)) {
                    try {
                        // Altera o cover para o id do item
                        $id = Filme::getMovieByTitle($filme->title);
                        $fileName = $id . '.' . $file->getClientOriginalExtension();
                        $path = $file->storeAs('images', $fileName);
                        Filme::where('id', $id)->update(array('cover' => $path));
                    } catch (QueryException $ex) {
                        $data["error"] = "Este filme já está cadastrado.";
                    }
                } else {
                    $data["error"] = "Por favor, selecione apenas arquivos jpeg, jpg ou png.";
                }
            }
            $data['success'] = "Dados atualizados com sucesso";
            $data['filme'] = $filme->where('id', $id)->first();
        }
        $data['categorias'] = Categoria::all();
        return view('filmes/edit', $data);
    }

    public function delete(Request $request, $id)
    {
        $data = [];
        if ($request->isMethod("get")) {
            $filme = new Filme();
            try {
                $data['filme'] = $filme->where('id', $id)->first();
            } catch (QueryException $ex) {
                return redirect('/home');
            }
        }

        if ($request->isMethod("post")) {
            try {
                $filme = new Filme();
                $cover = $filme->where('id', $id)->first();
                Storage::delete($cover->cover);
                Filme::deletar($id);
                return redirect('/home');
            } catch (QueryException $ex) {
                echo $ex;
            }
        }
        return view('filmes/delete', $data);
    }
}