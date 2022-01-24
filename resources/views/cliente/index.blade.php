@extends('layouts.app')

@section('content')
<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif
    
    <a href="{{ url('cliente/create') }}" class="btn btn-success">Registrar nuevo cliente</a>
    <br>
    <br>

    <h1>Listado de Clientes</h1>
    <br>


    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id}}</td>
                    <td>{{ $cliente->Nombre}}</td>
                    <td>{{ $cliente->Apellido}}</td>
                    <td>{{ $cliente->Correo}}</td>
                    <td>{{ $cliente->Telefono}}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$cliente->Foto) }}" width="100" alt="">
                    </td>
                    <td>
                        <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}" class="btn btn-warning">
                            Editar 
                        </a>
                        | 
                        <form action="{{ url('/cliente/'.$cliente->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                        </form> 
                        |
                        <a href="{{ url('productList/'.$cliente->id) }}" class="btn btn-success">
                            Realizar compra 
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $clientes->links() !!}
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
