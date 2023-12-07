@extends('layouts.plantilla')
@section('title', 'Usuarios')
@section('title_section', 'Usuarios')
@section('content')

          <div class="row">

            <div class="col-md-8 order-md-1">

              <form method="post" id="myform">
                <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" /> 

                <div class="mb-3">
                  <label for="nombre">Nombre </label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Hernan">
                </div>

                <div class="mb-3">
                  <label for="apellido">Apellido </label>
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Crespo">
                </div>

                <div class="mb-3">
                  <label for="genero">Genero </label>
                  <select class="form-control" id="genero" name="genero">
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                  </select>
                </div>


                <hr class="mb-4">
                <button class="btn btn-primary" type="submit" >Guardar</button>
              </form>
            </div>
          </div>

@endsection

@section('table_content')
          <hr/>

          <h2>Lista de Usuarios</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Genero</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($usuario as $usuario)
                <tr>
                  <td>{{ $usuario->nombre }}</td>
                  <td>{{ $usuario->apellido }}</td>
                  <td>{{ $usuario->genero }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

@endsection


@section('script_lib')

<script type="text/javascript">


$(function() {

    $("#myform").submit(function(e) {
        e.preventDefault();

        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route("usuarios.store") }}',
          method: 'POST',  
          data: $("#myform").serialize(),
          success: function(data) {
              location.reload();    
          }
        });

    });

});

</script>

@endsection