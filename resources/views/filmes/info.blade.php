@extends("layouts.home")
@section("conteudo")
<?php

use Carbon\Carbon;

$date = Carbon::parse($filme->release);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3 p-4 d-flex justify-content-center justify-content-md-start">
            <img class="img-fluid" src="{{ url('storage/' . $filme->cover) }}" alt="Capa do filme {{ $filme->title }}">
        </div>
        <div class="col-12 col-md-6 pt-2 pl-4 pr-4 align-self-center">
            <h1 class="h3 mb-3">{{ $filme->title }}</h1>
            <p class="">{{ $categoria->category }}</p>
            <p class="">Nota: {{ $filme->score }}</p>
            <p class="">Diretor: {{ $filme->director }}</p>
            <p class="">Lançamento: {{ $date->format('d/m/Y') }}</p>
        </div>
        <div class="pl-4 pr-4 mb-3 mt-4">
            <h2 class="h3 mb-3">Sinopse</h2>
            <p class="text-justify">{{ $filme->synopsis }}</p>
        </div>
        <div class="col-12 mr-0 ml-0 pr-0 row mb-3">
            <a class="col-12 col-md-5 col-lg-2 btn btn-warning mb-3"
                href="{{ url('home/filmes/' . $filme->id . '/edit') }}">
                <span class="font-weight-bold ">Editar</span>
                <i class="far fa-edit fa-2x"></i>
            </a>
            <a class="col-12 col-md-5 col-lg-2 ml-md-auto ml-lg-3 btn btn-danger mb-3"
                href="{{ url('home/filmes/' . $filme->id . '/delete') }}">
                <span class="font-weight-bold">Deletar</span>
                <i class="far fa-trash-alt fa-2x"></i>
            </a>
        </div>
    </div>
</div>

@endsection("conteudo")