<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoAtributo extends Model
{
    use HasFactory;
    protected $table = 'gruposatributos';
    protected $fillable = ['grupo','estado','orden','gruposatributo_id'];

    public function atributos()
    {
        return $this->hasMany('App\Models\Atributo','gruposatributo_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }

}
//Atributo::class