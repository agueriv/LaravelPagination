<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    
    protected $table = 'artist';
    
    // Como esta tabla le hemos quitado los timestamps tenemos que decirselo
    public $timestamps = false;
    
    protected $fillable = ['name', 'idargo', 'idoltro'];
    
    // Definimos que artist hacia disk tiene una relacion 1 a muchos
    // Un artista tiene muchos discos
    function disks() {
        return $this->hasMany('App\Models\Disk', 'idartist');
    }
    
    function argo() {
        return $this->belongsTo('App\Models\Argo', 'idargo');
    }
}
