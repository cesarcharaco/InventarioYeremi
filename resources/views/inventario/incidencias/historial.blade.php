@extends('layouts.app')
@section('title') Incidencias - Historial @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Inventario</h1>
      <p>Sistema Administrativo | Yermotos Repuestos C.A.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="">SAYER</a></li>
      <li class="breadcrumb-item"><a href="">Incidencias</a></li>
      <li class="breadcrumb-item"><a href="">Historial</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Incidencias
            <a class="btn btn-primary icon-btn pull-right" href="{{ route('incidencias.create') }}"><i class="fa fa-plus"></i>Registrar Incidencia</a>
            
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($historial as $key)
                <tr>
                  <td>{{ $key->codigo }}</td>
                  <td>{{ $key->created_at }}</td>
                  <td>
                    
                    <button title="Presione si desea deshacer el incidencia" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deshacer_incidencia" onclick="deshacer('{{ $key->codigo }}')"><i class="fa fa-undo"></i></button>
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalles" onclick="detalles('{{ $key->id_incidencia }}')"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- ver detalles  -->

<div class="bs-component">
  <div class="modal" id="detalles">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-eye"></i> Detalles del Insumo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tabla_detalles">
                  
                </table>
              </div>
            </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
          </div>          
        
      </div>
    </div>
  </div>
</div>
<!-- deshacer incidencia -->
<div class="bs-component">
  <div class="modal" id="deshacer_incidencia">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('incidencias.deshacer') }}" method="post" name="deshacer_incidencia" data-parsley-validate>
          @csrf
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash"></i> Deshacer Incidencia</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>

          <div class="modal-body">
            <p>¿Estas seguro que desea deshacer a este incidencia?</p>
          </div>
          <input type="hidden" name="codigo" id="codigo">
          <div class="modal-footer">
            <button class="btn btn-danger" type="submit">Deshacer</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
          </div>          
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  function deshacer(codigo) {
    console.log(codigo);
    $("#codigo").val(codigo);
  }
  function detalles(id_incidencia) {
    
    $.get('/incidencias/'+id_incidencia+'/detalles_historial',function(data){
      
      if (data.length>0) {
        $("#tabla_detalles").empty();
        $("#tabla_detalles").append('<tr><th>Insumo</th><tr><th>Descripción</th><th>Serial</th><th>Tipo</th><th>Cantidad</th><th>Fecha</th><th>Descontado de</th><th>Observación</th></tr>');
        
        for (var i =0;i < data.length; i++) {
          
          $("#tabla_detalles").append('<tr><td>'+j+'</td><td>'+data[i].producto+'</td><td>'+data[i].descripcion+'</td><td>'+data[i].serial+'('+data[i].tipo+')</td><td>'+data[i].cantidad+'</td><td>'+data[i].tipo+'</td><td>'+data[i].cantidad+'</td><td>'+data[i].fecha_incidencia+'</td><td>'+data[i].descontar+'</td><td>'+data[i].observacion+'</td></tr>');
        
        }
      }
    });
  }
</script>
@endsection