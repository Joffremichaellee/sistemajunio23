<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoAtributo extends Model
{
    use HasFactory;
    protected $table = 'gruposatributos';
    protected $fillable = ['marca','fabricante','logo'];
}
