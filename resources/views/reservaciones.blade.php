@extends('layouts.plantilla')
@section('title', 'Reservaciones')
@section('title_section', 'Reservaciones')
@section('content')

          <div class="row">

            <div class="col-md-8 order-md-1">

              <form method="post" id="myform">
                <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" /> 

                <div class="mb-3">
                  <label for="usuario">Usuario </label>
                  <select class="form-control" id="usuario" name="usuario">
                    @foreach ($usuario as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre . ' ' .$usuario->apellido }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="habitacion">Habitaciones </label>
                  <select class="form-control" id="habitacion" name="habitacion">
                    @foreach ($habitacione as $habitacione)
                        <option value="{{ $habitacione->id }}">{{ $habitacione->nombre_h . ' (' .$habitacione->nro_h.')' }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="fecha">Fecha </label>
                  <input type="text" class="form-control" id="fecha" name="fecha" placeholder="dd/mm/aaaa">
                </div>


                <hr class="mb-4">
                <button class="btn btn-primary" type="submit" >Reservar</button>
              </form>
            </div>
          </div>

@endsection

@section('table_content')
          <hr/>

          <h2>Lista de Reservaciones</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Habitacion</th>
                  <th>Fecha Reservada</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($result as $result)
                <tr>
                  <td>{{ $result->nombre. ' ' . $result->apellido }}</td>
                  <td>{{ $result->nombre_h }}</td>
                  <td>{{ $result->disponibilidad }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

@endsection


@section('script_lib')

<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">

$(function() {

    $("#myform").submit(function(e) {
        e.preventDefault();

        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route("reservaciones.store") }}',
          method: 'POST',  
          data: $("#myform").serialize(),
          success: function(data) {
            if (data=='success'){
              location.reload();    
            }else if (data=='reserved'){
                alert('Esta fecha esta reservada');
            }
          }
        });

    });

    $('#fecha').datepicker({
        format: 'dd/mm/yyyy'
    });

});

</script>

@endsection