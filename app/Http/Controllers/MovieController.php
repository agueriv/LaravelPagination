<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all(); // eloquent (saca todas las peliculas de la base de datos)
        // dd($movies); // var_dump de laravel
        return view('movie.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //1º Generamos el objeto para guardar los datos en la BD
        $object = new Movie($request->all());
        
        //2º Intentamos guardar
        try {
            $result = $object->save();  
            
            $checked = session('afterInsert', 'show movies');
            $target='movie';
        
            if($checked != 'show movies'){
                $target = $target.'/create';
               
            }
            
            //3º Si lo guarda vamos a redirigir a la página de create con un feedback de que se ha guardado bien
            return redirect($target)->with(['message'=> 'The movie has been saved.']);
            
        } catch(\Exception $e) {
            
        //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The Movie has not been saved.']);
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movie.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //1º generar el objeto para guardar
        
        
        try {
            
            $movie->update($request->all());
            
            $afterEdit = session('afterEdit', 'movie');
            // edit, movie, show
        
            if($afterEdit == 'movie'){
                $target = 'movie';
               
            } else if ($afterEdit == 'edit') {
                $target = 'movie/' . $movie->id . '/edit';
            } else {
                $target = 'movie/' . $movie->id;
            }
            //3º si lo he guardado volver a algún sitio
            return redirect($target)->with(['message'=> 'The Movie has been updated.']);
            
        } catch(\Exception $e) {
            
            //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The Movie has not been updated.']);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        try {
            $movie->delete();
            return redirect('movie')->with(['message'=> 'The Movie has been deleted.']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'The Movie has not been deleted.']);
        }
    }
    
    public function view(Request $request, Movie $id) {
        $movie = Movie::find($id);
        if($movie == null) {
            return abort(404);
        }
        dd($id, $movie);
    }
}
