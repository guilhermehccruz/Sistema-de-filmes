@extends("layouts.home")
@section("conteudo")
@if(isset($success))
<div class="alert alert-success mt-3">{{ $success }}</div>
@endif
@if(isset($error))
<div class="alert alert-danger mt-3">{{ $error }}</div>
@endif

<h1 class="h2 mt-4 ml-4">Editar filme</h1>
<div class="d-flex justify-content-center">
    <form class="row p-4" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="number" class="d-none" value="{{ $filme->id }}" name="id">
        <div class="form-group col-12 col-lg-6">
            <label for="title">Título</label>
            <input type="text" value="{{ $filme->title }}" class="form-control" name="title" id="title"
                placeholder="Título" maxlength="255" required>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="category">Categoria</label>
            <select class="custom-select" name="category" id="category">
                <option value="{{ $filme->category }}" selected>{{ $categorias[$filme->category -1 ]->category }}
                </option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12">
            <label for="synopsis">Sinopse</label>
            <textarea class="form-control" name="synopsis" id="synopsis" placeholder="Sinopse" required
                rows="6">{{ $filme->synopsis }}</textarea>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="score">Nota</label>
            <input type="number" value="{{ $filme->score }}" class="form-control" name="score" id="score"
                placeholder="Nota" min="0" max="5" step="0.1" required oninput="checkScore()">
        </div>

        <div class="form-group col-12 col-lg-6">
            <label for="director">Diretor</label>
            <input type="text" value="{{ $filme->director }}" class="form-control" name="director" id="director"
                placeholder="Diretor" maxlength="255" required>
        </div>
        <div class="form-group col-12 col-lg-6">
            <label for="release">Lançamento</label>
            <input type="date" value="{{ $filme->release }}" class="form-control" name="release" id="release" required>
        </div>
        <div class="form-group mt-1 col-12 col-lg-6">
            <label for="cover">Capa</label><br>
            <input value="{{ $filme->cover }}" type="file" name="cover" id="cover" accept="image/*">
        </div>
        <div class="form-group col-12 d-flex mt-3 justify-content-center">
            <button type="submit" class="btn btn-primary col-md-6 col-lg-4">Cadastrar</button>
        </div>
    </form>
</div>

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