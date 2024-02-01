<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class SettingController extends Controller
{
    public function index() {
        // Radio buttons crear pelicula
        $checked = session('afterInsert', 'show movies');
        $checkedList='checked';
        $checkedCreate='';
        
        if($checked != 'show movies'){
            $checkedCreate='checked';
            $checkedList='';
        }

        // Select de editar pelicula
        /*$afterEditMovie = [
            "showAllMovies" => '',
            "showMovie" => '',
            "showEditForm" => ''
        ];
        
        $afterEditMovie[session('afterEdit')] = 'selected';*/
        // Creamos un array con las opciones que queremos en el select
        $afterEdit = session('afterEdit', 'movie');
        $afterEditOptions = [
            'showMovie' => 'Show movie',
            'movie' => 'Show movie list',
            'edit' => 'Show edit movie form'
        ];
        
        return view('setting.index',
            ['checkedList' => $checkedList, 
             'checkedCreate' => $checkedCreate, 
             'afterEditOptions' => $afterEditOptions, 
             'selectedEditOption' => $afterEdit]);
    }
    
    public function update(Request $request) {
        session([
            'afterInsert'=> $request->afterInsert,
            'afterEdit' => $request->afterEdit
        ]);
        return  back()->with(['message' => 'Your change have been saved.']);
    }
    
    public function showSelect() {
        // Aqui vamos a tener las tres estructuras de datos
        $paises = [
            'albania' => 'Albania',
            'andorra' => 'Andorra',
            'austria' => 'Austria',
            'belgium' => 'Bélgica',
            'bosnia-and-herzegovina' => 'Bosnia y Herzegovina',
            'bulgaria' => 'Bulgaria',
            'croatia' => 'Croacia',
            'cyprus' => 'Chipre',
            'czech-republic' => 'República Checa',
            'denmark' => 'Dinamarca',
            'estonia' => 'Estonia',
            'finland' => 'Finlandia',
            'france' => 'Francia',
            'germany' => 'Alemania',
            'greece' => 'Grecia',
            'hungary' => 'Hungría',
            'iceland' => 'Islandia',
            'ireland' => 'Irlanda',
            'italy' => 'Italia',
            'latvia' => 'Letonia',
            'liechtenstein' => 'Liechtenstein',
            'lithuania' => 'Lituania',
            'luxembourg' => 'Luxemburgo',
            'macedonia' => 'Macedonia',
            'malta' => 'Malta',
            'moldova' => 'Moldavia',
            'monaco' => 'Mónaco',
            'montenegro' => 'Montenegro',
            'netherlands' => 'Países Bajos',
            'norway' => 'Noruega',
            'poland' => 'Polonia',
            'portugal' => 'Portugal',
            'romania' => 'Rumania',
            'russia' => 'Rusia',
            'san-marino' => 'San Marino',
            'serbia' => 'Serbia',
            'slovakia' => 'Eslovaquia',
            'slovenia' => 'Eslovenia',
            'spain' => 'España',
            'sweden' => 'Suecia',
            'switzerland' => 'Suiza',
            'ukraine' => 'Ucrania',
            'united-kingdom' => 'Reino Unido',
        ];
        
        $provincias = [
            'alava' => 'Álava',
            'albacete' => 'Albacete',
            'alicante' => 'Alicante',
            'almeria' => 'Almería',
            'avila' => 'Ávila',
            'badajoz' => 'Badajoz',
            'barcelona' => 'Barcelona',
            'burgos' => 'Burgos',
            'caceres' => 'Cáceres',
            'cadiz' => 'Cádiz',
            'castellon' => 'Castellón',
            'ciudad-real' => 'Ciudad Real',
            'cordoba' => 'Córdoba',
            'cuenca' => 'Cuenca',
            'gerona' => 'Gerona',
            'granada' => 'Granada',
            'guadalajara' => 'Guadalajara',
            'guipuzcoa' => 'Guipúzcoa',
            'huelva' => 'Huelva',
            'huesca' => 'Huesca',
            'jaen' => 'Jaén',
            'la-rioja' => 'La Rioja',
            'las-palmas' => 'Las Palmas',
            'leon' => 'León',
            'lerida' => 'Lérida',
            'lugo' => 'Lugo',
            'madrid' => 'Madrid',
            'malaga' => 'Málaga',
            'murcia' => 'Murcia',
            'navarra' => 'Navarra',
            'orense' => 'Orense',
            'palencia' => 'Palencia',
            'pontevedra' => 'Pontevedra',
            'salamanca' => 'Salamanca',
            'santa-cruz-de-tenerife' => 'Santa Cruz de Tenerife',
            'segovia' => 'Segovia',
            'sevilla' => 'Sevilla',
            'soria' => 'Soria',
            'tarragona' => 'Tarragona',
            'teruel' => 'Teruel',
            'toledo' => 'Toledo',
            'valencia' => 'Valencia',
            'valladolid' => 'Valladolid',
            'vizcaya' => 'Vizcaya',
            'zamora' => 'Zamora',
            'zaragoza' => 'Zaragoza',
        ];
        
        $countries = Pais::all();
        // Con esta instruccion obtener un array asociativo con los datos de la base de datos
        $countries2 = Pais::pluck('name', 'code');
        
        // $paises, $provincias, $countries
        return view('setting.showSelect', ['paises' => $paises,
                                           'pais' => 'denmark',
                                           'provincias' => $provincias, 
                                           'provincia' => 'malaga',
                                           'countries' => $countries,
                                           'selectedCountry' => 'DNK',
                                           'countries2' => $countries2,
                                           'selectedCountry2' => 'BHR']);
    }
}
