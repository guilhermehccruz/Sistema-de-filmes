@extends("layouts.home")
@section("conteudo")
<h2 class="mt-3">Deseja mesmo deletar este usuário?</h2>
@if(isset($success))
<div class="alert alert-success">{{ $success }}</div>
@endif
@if(isset($error))
<div class="alert alert-danger">{{ $error }}</div>
@endif
<form method="POST">
    @csrf
    <div class="form-group">
        <label for="id">Id</label>
        <input type="text" class="form-control" value="{{ $usuario->id }}" name="id" disabled>
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" value="{{ $usuario->login }}" name="name" disabled>
    </div>
    <input type="submit" value="Apagar" class="btn btn-primary mt-2">
</form>

@endsection("conteudo")