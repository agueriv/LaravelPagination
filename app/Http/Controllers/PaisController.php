<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    function index() {
        // consultas en eloquent
        $paises1 = Pais::all();
        $paises2 = Pais::orderBy('name')->get(); // ordena en la base de datos
        // $paises3NO = Pais::all()->sortBy('name'); // ordena en codigo por lo que es mas lento
        // consultas con where
        $paises3 = Pais::where('name', '>=', 't')->orderBy('name', 'desc')->take(10)->get(); // sacamos los 10 primero paises que cumplan la condicion
        $pais = Pais::find('ESP');
        $pais2 = Pais::where('name', '>=', 't')->orderBy('name', 'desc')->first();
        
        // dd([$paises3, $pais, $pais2]);
        
        // Consultas con DB
        $paises0 = Pais::where('name', '>=', 't')->get();
        $paises1 = DB::select('select * from pais where name >= :name', ['name' => 't']);
        foreach($paises0 as $pais) {
            // echo($pais->name . ' ' .  '<br>');
        }
        //echo '<hr>';
        foreach($paises1 as $pais) {
            // echo($pais->name . '<br>');
        }
        // dd($paises1);
        
        $paises2 = DB::table('pais')->get();
        // $pais1 = DB::table('pais')->find('AGO'); // da error porque solo puede buscar cuando hay un campo 'id'
        
        // Consultas con PDO
        $pdo = DB::connection()->getPdo();
        // sentencia preparada
        $sql = 'select * from pais where code < :code';
        // preparo la sentencia
        $sentencia = $pdo->prepare($sql);
        // asocio valores (le digo que quiero asociar tal parametro con tal valor)
        $sentencia->bindValue('code', 'AGO');
        // ejecutamos
        $sentencia->execute();
        // recorremos el cursor con el resultado que esta en $sentencia
        foreach($sentencia as $fila) {
            echo '<pre>' . var_export($fila, true) . '</pre>';
        }
        
        // Lo que haria laravel internamente
        $sql = "select * from pais";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
        $paises = [];
        foreach($sentencia as $fila) {
            $pais = new Pais($fila);
            $paises[] = $pais;
        }
        // dd($paises);
        
        // Sentencia no preparada ( no usar nunca )
        $pais = 'AGO';
        $sql = "select * from pais where code < '$pais'";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
    }
}
