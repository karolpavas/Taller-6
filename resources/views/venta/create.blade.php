
@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-between align-items-center">
    <div>
        <b><label>Cliente:</label></b>
        <label>{{ $cliente->Nombre }}</label>
        <label><img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$cliente->Foto) }}" width="100" alt=""></label>
    </div>
    <a  class="btn btn-primary" href="{{ url('cliente/') }}">Regresar</a>
</div>

<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif
        
    <h1>Listado de Productos a la venta</h1>
    <br>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id}}</td>
                    <td>{{ $producto->Nombre}}</td>
                    <td>{{ $producto->Descripcion}}</td>
                    <td>{{ $producto->Precio}}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$producto->Foto) }}" width="100" alt="">
                    </td>
                    <td>
                        <form action="{{ url('/comprar/'.$cliente->id."/".$producto->id) }}" method="post" class="d-inline">
                            @csrf
                            <input type="submit" class="btn btn-success" onclick="return confirm('¿Quieres Comprar?')" value="Comprar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $productos->links() !!}
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(700);
    },3000);
});
</script>
