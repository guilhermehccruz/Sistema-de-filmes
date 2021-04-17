<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route("home.index");
        }
        $data = [];
        if ($request->isMethod("Post")) {
            $login = $request->input("login");
            $password = $request->input("password");
            $remember = $request->input("remember");

            if (Auth::attempt(["login" => $login, "password" => $password], $remember)) {
                return redirect()->route("home.index");
            } else {
                $data["error"] = "Usuario ou senha invalidos.";
            }
        }
        return view('login', $data);
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    public function index()
    {
        return view('index');
    }

    public function listaCadastra(Request $request)
    {
        $data = [];
        if ($request->isMethod("POST")) {
            $usuario = new Usuario($request->all());
            //Criptografa a senha
            $usuario->password = Hash::make($request->input("password"));

            //Gravar no banco
            try {
                $usuario->save();
                $data["success"] = "Usuario salvo com sucesso!";
            } catch (QueryException $ex) {
                $data["error"] = "Erro! Este login já está sendo usado.";
            }
        }
        $data["usuarios"] = Usuario::all();
        return view('usuarios/usuarios', $data);
    }

    public function delete(Request $request, $id)
    {
        $data = [];
        if ($request->isMethod("get")) {
            $id = $request->id;
            $usuario = new Usuario();
            try {
                $data['usuario'] = $usuario->where('id', $id)->first();
            } catch (QueryException $ex) {
                $data['error'] = "Usuário não encontrado";
            }
        }

        if ($request->isMethod("post")) {
            $id = $request->id;

            try {
                Usuario::deletar($id);
                return redirect('/home/usuarios');
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        return view('usuarios/delete', $data);
    }
}