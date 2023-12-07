@extends('layouts.plantilla')
@section('title', 'Habitaciones')
@section('title_section', 'Habitaciones')
@section('content')

          <div class="row">

            <div class="col-md-8 order-md-1">

              <form method="post" id="myform">
                <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" /> 

                <div class="mb-3">
                  <label for="nro">Nro Habitacion </label>
                  <input type="text" class="form-control" id="nro" name="nro" placeholder="001">
                </div>

                <div class="mb-3">
                  <label for="nombre">Nombre Habitacion </label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Suite 001">
                </div>

                <div class="mb-3">
                  <label for="precio">Precio Habitacion </label>
                  <input type="text" class="form-control" id="precio" name="precio" placeholder="$60">
                </div>


                <hr class="mb-4">
                <button class="btn btn-primary" type="submit" >Guardar</button>
              </form>
            </div>
          </div>

@endsection

@section('table_content')
          <hr/>

          <h2>Lista de Habitaciones</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($habitacione as $habitaciones)
                <tr>
                  <td>{{ $habitaciones->nro_h }}</td>
                  <td>{{ $habitaciones->nombre_h }}</td>
                  <td>{{ $habitaciones->precio_h }}</td>
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
          url: '{{ route("habitaciones.store") }}',
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