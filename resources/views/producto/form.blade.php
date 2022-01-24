<h1>{{$modo}} producto</h1>

   <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($producto->Nombre) ? $producto->Nombre:old('Nombre')}}">
   </div>

   <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <input type="text" class="form-control" name="Descripcion" id="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion')}}">
   </div>

   <div class="form-group">
      <label for="precio">Precio</label>
      <input type="text" class="form-control"  name="Precio" id="Precio" value="{{ isset($producto->Precio)?$producto->Precio:old('Precio')}}">
   </div>

   <div class="form-group">
      <label for="foto"></label>
      @if(isset($producto->Foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$producto->Foto) }}" width="100" alt="">
      @endif
      <input type="file" class="form-control" name="Foto" id="Foto">
      <br>
   </div>

   <div class="form-group">
      <input type="submit"  class="btn btn-success" value="{{ $modo }} producto">
      <a  class="btn btn-primary" href="{{ url('producto/') }}">Regresar</a>
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
