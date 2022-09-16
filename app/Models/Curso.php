<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // esto hace que estos campos solo se puedan cargar en la base de modo de asignasion masiva
    //protected $fillable =['name','descripcion','categoria'];

    // Esto hace que sea al revez de lo de arriba , los campos protegidos
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}