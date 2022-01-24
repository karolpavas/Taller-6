<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(4);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:100',
            'Precio' => 'required|string|max:50',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosProductos = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosProductos['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Producto::insert($datosProductos);
        return redirect('producto')->with('mensaje','Producto agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto= Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:100',
            'Precio' => 'required|string|max:50',
        ];

        $mensaje=['required'=>'El :attribute es requerido'];

        if($request->hasFile('Foto')){
            $campos=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){
            $producto= Producto::findOrFail($id);
            Storage::delete('public/'.$producto->foto);
            $datosProducto['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Producto::where('id','=',$id)->update($datosProducto);

        $producto= Producto::findOrFail($id);
        return redirect('producto')->with('mensaje','Producto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto= Producto::findOrFail($id);
        if(Storage::delete('public/'.$producto->Foto)){
            Producto::destroy($id);
        }
        return redirect('producto')->with('mensaje','Producto Borrado');
    }
}
