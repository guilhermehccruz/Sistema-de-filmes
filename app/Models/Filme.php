<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;
    protected $table = "usuarios";
    protected $fillable = ['title', 'synopsis', 'category', 'score', 'director', ''];
    public $timestamps = false;
}