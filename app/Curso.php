<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
   protected $table = "curso";
   protected $fillable = ['name', 'description'];  // Aqui eu vou poder editar colocando os nomes das materias e a descrição delas 

}
