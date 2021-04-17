<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = "usuarios";
    protected $fillable = ['login', 'password'];
    public $timestamps = false;

    public static function deletar($id)
    {
        DB::table('usuarios')->where('id', $id)->delete();
    }

    public function getAuthIdentifierName()
    {
        return "login";
    }

    public function getAuthIdentifier()
    {
        return $this->login;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
    }
}