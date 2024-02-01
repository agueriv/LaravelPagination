<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disk extends Model
{
    use HasFactory;
    
    protected $table = 'disk';
    
    protected $fillable = ['idartist', 'title', 'year', 'cover'];
    
    // Definimos que disk hacia artist tiene una relacion muchos a 1
    // Un disco o unos discos son de un solo artista
    function artist() {
        return $this->belongsTo('App\Models\Artist', 'idartist');
    }
}
