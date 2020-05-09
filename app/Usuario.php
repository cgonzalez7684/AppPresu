<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = 'TblUsuarios';
    protected $primaryKey = 'nIdUsuario';
    public $timestamps = false;
}
