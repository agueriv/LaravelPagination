<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class PaginateArtistController extends Controller
{
    // Guardamos el nombre de la ruta donde estan las views
    private $bladeFolder = 'paginateartist';
    const RPP = 10;
    const ORDERBY = 'id';
    const ORDERTYPE = 'asc';
    
    private function getBladeFolder(string $folder) {
        return $this->bladeFolder . '.' . $folder;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rowPerPage = self::getFromRequest($request, 'rowPerPage', self::RPP);
        $orderBy = self::getFromRequest($request, 'orderBy', self::ORDERBY);
        $orderType = self::getFromRequest($request, 'orderType', self::ORDERTYPE);
        $q = self::getFromRequest($request, 'q', null);
        if($q == null) {
           $artists = Artist::select('artist.*')
                            ->join('argo', 'argo.name', '=', 'artist.idargo')
                            ->orderBy($orderBy, $orderType)
                            ->orderBy('name', 'asc')->paginate($rowPerPage); 
        } else {
            $artists = Artist::where('name', 'like', '%' . $q . '%')
                            ->join('argo', 'artist.idargo', '=', 'argo.name')
                            ->orWhere('id', 'like', '%'. $q .'%')
                            ->orWhere('idargo', 'like', '%'. $q .'%')
                            ->orWhere('idoltro', 'like', '%'. $q .'%')
                            ->orderBy($orderBy, $orderType)->orderBy('name', 'asc')->paginate($rowPerPage);
        }
        
        dd($artists);
        
        return view($this->getBladeFolder('index'), ['artists' => $artists, 
                                                     'orderBy' => $orderBy,
                                                     'orderType' => $orderType,
                                                     'q' => $q,
                                                     'rpp' => $rowPerPage,
                                                     'rpps' => self::getRowPerPage()]);
    }
    
    private static function getFromRequest($request, $name, $defaultValue) {
        $value = $defaultValue;
        if($request->$name != null) {
            $value = $request->$name;
        }
        return $value;
    }
    
    public function index2(Request $request) {
        // 1º
        $rpp = $request->rowPerPage != null ? $request->rowPerPage : self::RPP;
        // 2º
        $page = $request->page != null ? $request->page : 1;
        // 3º
        $limit = $rpp * ($page - 1);
        $sql  = "select * from artist limit $limit, $rpp";
        $artists = DB::select($sql);
        // 4º
        $total = DB::table('artist')->count();
        $totalPages = ceil($total / $rpp);
        
        return view($this->getBladeFolder('index2'), ['artists' => $artists, 
                                                      'page' => $page,
                                                     'rpp' => $rpp,
                                                     'rpps' => self::getRowPerPage(),
                                                     'totalPages' => $totalPages]);
    }
    
    private static function getRowPerPage() {
        return [10 => 10, 25 => 25, 50 => 50, 100 => 100];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
