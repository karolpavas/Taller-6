
@extends('layouts.app')

@section('content')
<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif

    <h1>Listado de Ventas</h1>
    <br>

    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Foto</th>
                <th>Producto</th>
                <th>Foto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{$venta->id }}</td>
                    <td>{{ $venta->nombreCliente}}</td>
                    <td><img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$venta->fotoCliente) }}" width="100" alt=""></td>
                    <td>{{ $venta->nombreProducto}}</td>
                    <td><img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$venta->fotoProducto) }}" width="100" alt=""></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ventas->links() !!}
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

