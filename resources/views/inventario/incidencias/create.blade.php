@extends('layouts.app')
@section('title') Registro de Incidencia @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> SAYER</h1>
      <p>Sistema Administrativo | Yermotos Repuestos C.A.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="">SAYER</a></li>
      <li class="breadcrumb-item"><a href="{{ route('incidencias.index') }}">Incidencias</a></li>
      <li class="breadcrumb-item"><a href="">Registro de Incidencia</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Incidencias</h2>
        </div>
        <br>
        <div class="basic-tb-hd text-center">            
            @if(count($errors))
            <div class="alert-list m-4">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            @endif
            @include('flash::message')
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h4>Registro de Incidencia <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            <form name="form_prestamo" id="form_prestamo" action="{{ route('incidencias.store') }}" method="post" data-parsley-validate>
              @csrf
              <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-10 col-xs-11">                  
                  <div class="form-group">
                    <label class="control-label">Insumos <b style="color: red;">*</b></label><br>
                    <select name="id_insumo" id="id_insumo" class="form-control select2" title="Seleccione un insumo">
                      @foreach($insumos as $key)
                      
                        <option value="{{ $key->id_insumoc }}">{{ $key->producto }} |  Serial: {{ $key->serial }} | {{ $key->descripcion }} | En Depósito: <b>{{ $key->deposito }}</b>  | En Local: <b>{{ $key->local }}</b> | Local: <b> {{$key->nombre}}</option>
                      
                      @endforeach
                    </select>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Tipo de Incidencia <b style="color: red;">*</b></label>
                    <select name="tipo" id="tipo" title="Seleccione el tipo de Incidencia" class="form-control">
                      <option value="Dañado de Fábrica">Dañado de Fábrica</option>
                      <option value="Dañado en Local">Dañado en Local</option>
                      <option value="Dañado y Devuelto">Dañado y Devuelto</option>
                      <option value="Perdido">Perdido</option>
                      <option value="Vencido">Vencido</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Fecha<b style="color: red;">*</b></label>
                    <input class="form-control datepicker" type="text"  data-date-end-date="0d" required="required" name="fecha_incidencia" id="fecha_incidencia" placeholder="Seleccione la fecha en la que ocurrió">
                  </div>
                </div>
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Cantidad <b style="color: red;">*</b> <small>(Stock)</small></label>
                    <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="Ingrese cantidad" title="La cantidad no debe superar el máximo disponible del insumo" required="required">
                    <small>La cantidad no debe superar el máximo disponible del insumo</small><br>
                    <small><span id="mensaje" style="color:red"></span></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Descontar de: <b style="color: red;">*</b></label>
                    <select name="descontar" id="descontar" title="Seleccione el lugar de donde se descontará la Incidencia" class="form-control">
                      <option value="Local">Local</option>
                      <option value="Depósito">Depósito</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-8">                  
                  <div class="form-group">
                    <label class="control-label">Observación</label>
                    <textarea name="observacion" id="observacion" class="form-control" cols="10" rows="5"></textarea>
                  </div>
                </div>  
              </div>
          <div class="tile-footer">
            <button class="btn btn-primary" disabled="disabled" type="submit" name="registrar" id="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ url('incidencias') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
@section('scripts')
<script type="text/javascript">
$('.datepicker').datepicker({
    maxDate: '+0d'
});
  /*$("#id_gerencia").on('change',function (event) {
    var id_gerencia=event.target.value;
    //console.log(id_gerencia);
    $.get('/insumos/'+id_gerencia+'/buscar',function (data) {
      //console.log(data.length);
      $("#id_insumo").empty();
      if (data.length>0) {
        
      $("#id_insumo").append('<option value="0">Seleccione un Insumo</option>');
        for(var i=0;i<data.length;i++){
          $("#id_insumo").append('<option value="'+data[i].id+'">'+data[i].producto+' ('+data[i].descripcion+') - Disponibles: '+data[i].disponibles+'</opction>');
        }
      $("#id_insumo").append('</optgroup>');
      }
    });
  });*/


  $("#cantidad").on('keyup',function (event) {
    var cantidad = event.target.value;
    //console.log(cantidad);
    var id_insumo=$("#id_insumo").val();
    //console.log(id_insumo);
    if(id_insumo>0){
    $.get('/insumos/'+id_insumo+'/buscar_existencia',function(data){
      //console.log(data+'ooooooo-'+cantidad);
      var resta = data-cantidad;
      //console.log(resta);
      if (resta<0) {
        $("#mensaje").text('La cantidad ha superado el límite disponible');
        $("#registrar").attr('disabled',true);
      } else {
        $("#mensaje").text('');
        $("#registrar").removeAttr('disabled');
      }
    });
    }
  });

  $("#id_insumo").on('change',function(event){
    var id=event.target.value;
    var gerencia=$("#id_gerencia").val();
    if (id>0 && gerencia>0) {
      $("#cantidad").removeAttr('disabled');
      $("#registrar").removeAttr('disabled');
    } else {
      $("#cantidad").val('');
      $("#cantidad").attr('disabled',true);
      $("#registrar").attr('disabled',true);
    }
  });


</script>
@endsection