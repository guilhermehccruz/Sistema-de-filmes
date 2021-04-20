@extends("layouts.home")
@section("conteudo")
<h2 class="mt-3">Deseja mesmo deletar este filme?</h2>
@if(isset($success))
<div class="alert alert-success">{{ $success }}</div>
@endif
@if(isset($error))
<div class="alert alert-danger">{{ $error }}</div>
@endif
<form method="POST">
    @csrf
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 p-4 d-flex justify-content-center justify-content-md-start">
                <img class="img-fluid" src="{{ url('storage/' . $filme->cover) }}"
                    alt="Capa do filme {{ $filme->title }}">
            </div>
            <div class="col-12 col-md-6 pt-2 pl-4 pr-4 align-self-center">
                <h1 class="h3 mb-3">{{ $filme->title }}</h1>
            </div>
        </div>
        <input type="submit" value="Apagar" class="btn btn-primary mt-2 mb-4">
    </div>
</form>

@endsection("conteudo")