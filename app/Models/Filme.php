<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Filme extends Model
{
    use HasFactory;
    protected $table = "filmes";
    protected $fillable = ['title', 'synopsis', 'category', 'score', 'director', 'release', 'cover'];

    public $timestamps = false;

    public static function getMovieByTitle($title)
    {
        return DB::table('filmes')->where('title', $title)->first()->id;
    }

    public static function deletar($id)
    {
        DB::table('filmes')->where('id', $id)->delete();
    }
}