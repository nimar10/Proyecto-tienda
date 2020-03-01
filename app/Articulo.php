<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable=['nombre','marca','precio', 'descripcion', 'foto','categoria_id'];


    //Un articulo tiene una marca nada mas

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }


    // Scope para las categorias
    public function scopeCategoria_id($query, $x){
        if($x=='%'){
            return $query->where('categoria_id','like',$x)
            ->orWhereNull('categoria_id');
        }
        if($x==-1){
            return $query->whereNull('categoria_id');
        }
        if(!isset($x)){
            return $query->where('categoria_id','like' ,'%')
            ->orWhereNull('categoria_id');
        }
        return $query->where('categoria_id', $x);
    }
}
