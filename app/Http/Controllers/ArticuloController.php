<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categorias=Categoria::orderBy('nombreCat')->get();

        $lasCategorias=$request->get('categoria_id');

        $articulos=Articulo::orderBy('id')
        ->categoria_id($lasCategorias)
        ->paginate(3);
        return view('articulos.index', compact('articulos','categorias','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre'=>['required'],
            'marca'=>['required']
        ]);

        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            
            $file=$request->file('foto');

            $nombre='foto/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            $articulo=Articulo::create($request->all());
            $articulo->update(['foto'=>"img/$nombre"]);
        }else{
            Articulo::create($request->all());
        }
        
        
        return redirect()->route('articulos.index')->with("mensaje", "Articulo Prime Creado con Exito!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        
        return view('articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'nombre'=>['required'],
            'marca'=>['required']
        ]);
        
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            
            $file=$request->file('foto');
            $nombre='foto/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            
            if(basename($articulo->foto)!='default.jpg'){
                unlink($articulo->foto);
            }
            
            $articulo->update($request->all());
            $articulo->update(['foto'=>"img/$nombre"]);
        }
        else{
            $articulo->update($request->all());
        }
        $articulo->save();
        return redirect()->route('articulos.index')->with("mensaje", "Articulo Prime modificado con exito!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $foto=$articulo->foto;
        if(basename($foto)!="default.jpg"){
            unlink($foto);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje','Articulo Prime eliminado con Exito!!!');
    }
}
