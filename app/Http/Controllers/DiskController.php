<?php

namespace App\Http\Controllers;

use App\Models\Disk;
use App\Models\Artist;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DiskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disks = Disk::all();
        
        return view('disk.index', ['disks' => $disks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return $this->createArtist($request, $request->idartist);
    }
    
    public function createArtist(Request $request, $idartist)
    {
        if($idartist == null) {
            return back();
        }
        $artist = Artist::find($idartist);
        if($artist == null) {
            return back();
        }
        $artists = Artist::pluck('name', 'id');
        return view('disk.create', ['artists' => $artists, 'artist' => $artist]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            dd($request);
            $disk = new Disk($request->all());
            if($request->hasFile('file') && $request->file('file')->isValid()) {
                // Guardamos el archivo en una variable
                $archivo = $request->file('file');
                // Crea la carpeta images si no existe la carpeta
                $path2 = $archivo->storeAs('public/images', $archivo->getClientOriginalName());
                // Cotejamos el tipo de archivo que suben.
                // Es fundamental comprobar que sea los archivo que queremos permitir 
                // para que no tengamos problemas de seguridad ni de nada
                $mime = $archivo->getMimeType();
                // Obtengo la url donde se sube automatico
                $path = $archivo->getRealPath();
                // Redimensionamos las imagenes para que tengna las dimensiones que queremos
                $image = Image::make($path)->resize(245, 245, function($constraint) {
                    $constraint->aspectRatio();
                });
                
                $canvas = Image::canvas(245, 245);
                $canvas->insert($image, 'center');
                $canvas->save($path); // guarda en public
                // Obtenemos el contenido del archivo
                $imagen = file_get_contents($path);
                // Guardamos la imagen en el modelo en base64
                $disk->cover = base64_encode($imagen);
            }
            $result = $disk->save();  
            return redirect('disk')->with(['message'=> 'The disk has been saved.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The disk has not been saved.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Disk $disk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disk $disk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disk $disk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disk $disk)
    {
        //
    }
    
    function view() {
        return response()->file(storage_path('app') . '/public/images/envelope-solid.svg');
    }
}
