<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argo extends Model
{
    use HasFactory;
    
    protected $table = 'argo';
    
    // Como esta tabla le hemos quitado los timestamps tenemos que decirselo
    public $timestamps = false;
    
    protected $fillable = ['name'];
    
    // Definimos que artist hacia disk tiene una relacion 1 a muchos
    // Un artista tiene muchos discos
    function artists() {
        return $this->hasMany('App\Models\Artist', 'idargo');
    }
}
