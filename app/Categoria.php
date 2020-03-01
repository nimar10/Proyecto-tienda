<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=['nombreCat'];

    //vamos a tener muchos articulos en categorias

    public function articulos(){
        return $this->hasMany(Articulo::class);
    }
}
