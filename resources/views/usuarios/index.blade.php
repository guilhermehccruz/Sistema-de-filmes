@extends("layouts.home")
@section("conteudo")
@if(isset($success))
<div class="alert alert-success mt-3">{{ $success }}</div>
@endif
@if(isset($error))
<div class="alert alert-danger mt-3">{{ $error }}</div>
@endif
<div class="dropdown mt-3">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Cadastrar Usuário
    </button>
    <form class="dropdown-menu p-4" method="POST">
        @csrf
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<h2 class="mt-5">Usuários cadastrados</h2>
<table class="table text-center">
    <tr>
        <th>Id Usuário</th>
        <th>Login</th>
        <th>Deletar</th>
    </tr>
    @foreach($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->login }}</td>
        <th>
            <a href="<?= url('home/usuarios/' . $usuario->id . '/delete') ?> " class="text-danger ml-3"><i
                    class="far fa-trash-alt fa-2x"></i></a>
        </th>
    </tr>
    @endforeach
</table>

@endsection("conteudo")