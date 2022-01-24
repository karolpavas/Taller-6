@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ url('/cliente/'.$cliente->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('cliente.form',['modo'=>'Editar'])
    </form>
</div>
@endsection
