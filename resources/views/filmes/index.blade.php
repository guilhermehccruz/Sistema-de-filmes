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
        Cadastrar Filme
    </button>
    <form class="dropdown-menu p-4" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Título" maxlength="255"
                required>
        </div>
        <div class="form-group">
            <label for="synopsis">Sinopse</label>
            <input type="text" class="form-control" name="synopsis" id="synopsis" placeholder="Sinopse" required>
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="custom-select" name="category" id="category">
                <option selected>Selecionar categoria</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="score">Nota</label>
            <input type="number" class="form-control" name="score" id="score" placeholder="Nota" min="0" max="5"
                step="0.1" required oninput="checkScore()">
        </div>

        <div class="form-group">
            <label for="director">Diretor</label>
            <input type="text" class="form-control" name="director" id="director" placeholder="Diretor" maxlength="255"
                required>
        </div>
        <div class="form-group">
            <label for="release">Lançamento</label>
            <input type="date" class="form-control" name="release" id="release" required>
        </div>
        <div class="form-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="cover" aria-describedby="cover">
                <label class="custom-file-label" for="cover">Capa</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<h2 class="mt-5">Filmes cadastrados</h2>
<table class="table text-center">
    <tr>
        <th>Id Usuário</th>
        <th>Login</th>
        <th>Deletar</th>
    </tr>
    @foreach($filmes as $filme)
    <tr>
        <td>{{ $filme->id }}</td>
        <td></td>
        <th>
            <a href="<?= url('home/filme/' . $filme->id . '/delete') ?> " class="text-danger ml-3"><i
                    class="far fa-trash-alt fa-2x"></i></a>
        </th>
    </tr>
    @endforeach
</table>


<script>
function checkScore() {
    let input = document.getElementById("score")
    if (input.value > 5) {
        input.value = 5
    } else if (input.value < 0) {
        input.value = 0
    }
}
</script>
@endsection("conteudo")