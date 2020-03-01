<?php

namespace App\Http\Controllers;

use App\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedore=Vendedor::orderBy('id')
        ->paginate(3);
        return view('vendedores.index',compact('vendedore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
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
            'apellidos'=>['required'],

        ]);

        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            
            $file=$request->file('foto');

            $nombre='foto/'.time().'_'.$file->getClientOriginalName();
            
            Storage::disk('public')->put($nombre, \File::get($file));
            
            $vendedore=Vendedor::create($request->all());
            
            $vendedore->update(['foto'=>"img/$nombre"]);
        }else{
            Vendedor::create($request->all());
        }
        
        
        return redirect()->route('vendedores.index')->with("mensaje", "Vendedor Prime contratado con Exito!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedore)
    {   
        
        return view('vendedores.show', compact('vendedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedore)
    {
        return view('vendedores.edit', compact('vendedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedor $vendedore)
    {
        $request->validate([
            'nombre'=>['required'],
            'apellidos'=>['required']
        ]);
        
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            
            $file=$request->file('foto');
            $nombre='foto/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            
            if(basename($vendedore->foto)!='default.jpg'){
                unlink($vendedore->foto);
            }
            
            $vendedore->update($request->all());
            $vendedore->update(['foto'=>"img/$nombre"]);
        }
        else{
            $vendedore->update($request->all());
        }
        $vendedore->save();
        return redirect()->route('vendedores.index')->with("mensaje", "Vendedor se le cambio el contrato con exito!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedore)
    {
        $foto=$vendedore->foto;
        if(basename($foto)!="default.jpg"){
            unlink($foto);
        }
        $vendedore->delete();
        return redirect()->route('vendedores.index')->with('mensaje','Vendedor Prime despedido con Exito!!!');
    }
}
