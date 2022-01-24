   
   <h1>{{$modo}} cliente</h1>

   <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($cliente->Nombre) ? $cliente->Nombre:old('Nombre')}}">
   </div>

   <div class="form-group">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" name="Apellido" id="Apellido" value="{{ isset($cliente->Apellido)?$cliente->Apellido:old('Apellido')}}">
   </div>

   <div class="form-group">
      <label for="correo">Correo</label>
      <input type="text" class="form-control"  name="Correo" id="Correo" value="{{ isset($cliente->Correo)?$cliente->Correo:old('Correo')}}">
   </div>

   <div class="form-group">
      <label for="telefono">Telefono</label>
      <input type="text" class="form-control" name="Telefono" id="Telefono" value="{{ isset($cliente->Telefono)?$cliente->Telefono:old('Telefono')}}">
   </div>

   <div class="form-group">
      <label for="foto"></label>
      @if(isset($cliente->Foto))
      <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$cliente->Foto) }}" width="100" alt="">
      @endif
      <input type="file" class="form-control" name="Foto" id="Foto">
      <br>
   </div>

   <div class="form-group">
      <input type="submit"  class="btn btn-success" value="{{ $modo }} cliente">
      <a  class="btn btn-primary" href="{{ url('cliente/') }}">Regresar</a>
   </div>

   @if (count($errors)>0)
   <div class="alert alert-danger" role="alert">
      <ul>
         @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
         @endforeach 
      </ul>
   </div>
@endif
