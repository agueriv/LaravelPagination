<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    
    protected $table = 'pais';
    // Asi cambiamos que el campo de clave primaria sea code para que no haya problemas al buscar
    protected $primaryKey = 'code';
    
    protected $fillable = ['code', 'name'];
}
