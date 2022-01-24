<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['ventas']=Venta::join('clientes','clientes.id','=','ventas.cliente_id')->join('productos','productos.id','=','ventas.producto_id')->
            select('clientes.Nombre as nombreCliente','clientes.Foto as fotoCliente','productos.Nombre as nombreProducto',
            'productos.Foto as fotoProducto','ventas.*')->paginate(4);
        //$datos['ventas']=Venta::paginate(4);
        return view('venta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.create');
    }

    public function productList($id){
        $datos['productos']=Producto::paginate(4);
        $datos['cliente']=Cliente::findOrFail($id);
        return view('venta.create', $datos);
    }

    public function comprar($cliente_id,$producto_id){
        $producto= Producto::findOrFail($producto_id);
        $cliente= Cliente::findOrFail($cliente_id);
        
        Venta::insert(['cliente_id'=>$cliente->id,'producto_id'=>$producto->id]);
        
        return redirect("productList/{$cliente->id}")->with('mensaje','Venta realizada, usted compró:'.$producto->Nombre);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
