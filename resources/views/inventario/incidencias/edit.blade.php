@extends('layouts.app')
@section('title') Actualización de Incidencia @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Inventario</h1>
      <p>Sistema de Inventario | Licancabur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="">Inventario</a></li>
      <li class="breadcrumb-item"><a href="{{ route('incidencias.index') }}">Incidencias</a></li>
      <li class="breadcrumb-item"><a href="">Actualización de Incidencia</a></li>
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
          <h4>Actualización de Incidencia <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            {!! Form::open(['route' => ['incidencias.update',$incidencia->id], 'method' => 'PUT', 'name' => 'editar_incidencia', 'id' => 'editar_incidencia', 'data-parsley-validate']) !!}
              @csrf
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">                  
                  <div class="form-group">
                    <label class="control-label">Gerencias <b style="color: red;">*</b></label>
                    <select name="id_gerencia" id="id_gerencia" class="form-control" title="Seleccione la gerencia" required="required">
                      
                        <option value="0">Seleccione una gerencia</option>
                      @foreach($gerencias as $key)
                      <option value="{{ $key->id }}" @if($key->id==$incidencia->insumos->id_gerencia) selected="selected" @endif >{{ $key->gerencia }}</option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>              
              
                <div class="col-lg-5 col-md-8 col-sm-8 col-xs-8">                  
                  <div class="form-group">
                    <label class="control-label">Insumos <b style="color: red;">*</b></label><br>
                    <select name="id_insumo" id="id_insumo" class="form-control select2" title="Seleccione un insumo">
                    	@foreach($insumos as $key)
                    		<option value="{{ $key->id }}" @if($key->id==$incidencia->id_insumo) selected="selected" @endif >{{ $key->producto }} ({{ $key->descripcion }})</option>
                    	@endforeach
                    </select>
                  </div>
                </div> 
                </div>
              <div class="row">
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Tipo de Incidencia <b style="color: red;">*</b></label>
                    <select name="tipo" id="tipo" title="Seleccione el tipo de Incidencia" class="form-control">
                      <option value="Usados" @if($incidencia->tipo=="Usados") selected="selected"  @endif >Usados</option>
                      <option value="Inservible" @if($incidencia->tipo=="Inservible") selected="selected" @endif >Inservible</option>
                    </select>
                  </div>
                </div>
              <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Observación</label>
                    <textarea name="observacion" id="observacion" class="form-control" cols="10" rows="5"> {{ $incidencia->observacion }} </textarea>
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Fecha <b style="color: red;">*</b></label>
                    <input class="form-control datepick" type="text" required="required" name="fecha_incidencia" id="fecha_incidencia" placeholder="Seleccione la fecha en la que se realiza" max="{{ $hoy }}" value="{{ $incidencia->fecha_incidencia }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Cantidad <b style="color: red;">*</b> <small>(Stock)</small></label>
                    <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="Ingrese cantidad" title="La cantidad no debe superar el máximo disponible del insumo" required="required" value="{{ $incidencia->cantidad }}">
                    <small>La cantidad no debe superar el máximo disponible del insumo</small><br>
                    <small><span id="mensaje" style="color:red"></span></small>
                  </div>
                </div>
              </div><hr>
              
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" disabled="disabled" type="submit" name="registrar" id="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ url('inventario/incidencias') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
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

  $("#id_gerencia").on('change',function (event) {
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
  });


  $("#cantidad").on('keyup',function (event) {
    var cantidad = event.target.value;
    //console.log(cantidad);
    var id_insumo=$("#id_insumo").val();
    if(id_insumo>0){
    $.get('/insumos/'+id_insumo+'/buscar_existencia',function(data){
      //console.log(data+'-'+cantidad);
      var resta = data-cantidad;
      console.log(resta);
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