@extends('layouts.home')
@section("conteudo")

<h1 class="h2 mt-4 mb-4">Filmes</h1>
<?php

use Carbon\Carbon;

?>
<div class="row">
    @foreach($filmes as $filme)
    <?php
    $date = Carbon::parse($filme->release);
    ?>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-5">
        <div class="card">
            <img class="card-img-top" src="{{ url('storage/' . $filme->cover) }}"
                alt="Capa do filme {{ $filme->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $filme->title }}</h5>
                <p class="card-text">{{ $categorias[ ($filme->category - 1)]->category }}</p>
                <p class="card-text">Nota: {{ $filme->score }}</p>
                <p class="card-text">Lançamento: {{ $date->format('d/m/Y') }}</p>
                <a href="{{ url('home/filmes/' . $filme->id) }}" class="btn btn-primary">Ver mais</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection("conteudo")