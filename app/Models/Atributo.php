<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;
    protected $fillable = ['atributo','estado','orden','gruposatributo_id'];

    public function gruposatributos(){
        return $this->belongsTo('App\Models\GrupoAtributo');
    }
    /*public function getRouteKeyName()
    {
        return 'namew';
    }*/

}
