
@extends('layouts.app')

@section('content')
<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif
    
    <a href="{{ url('producto/create') }}" class="btn btn-success">Registrar nuevo producto</a>
    <br>
    <br>

    <h1>Listado de Productos</h1>
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
                        <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                            Editar 
                        </a>
                        | 
                        <form action="{{ url('/producto/'.$producto->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
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
