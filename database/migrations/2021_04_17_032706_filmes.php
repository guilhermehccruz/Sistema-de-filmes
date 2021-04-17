<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Filmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('synopsis');
            $table->foreignId('category')->references('id')->on('usuarios');
            $table->float('score');
            $table->date('release');
            $table->string('director');
            $table->string('cover');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}