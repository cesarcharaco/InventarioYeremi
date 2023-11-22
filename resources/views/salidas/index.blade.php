@extends('layouts.app')
@section('title') Salidas @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> SAYER</h1>
      <p>Sistema de Administrativo | Yermotos Repuestos C.A.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="#">SAYER</a></li>
      <li class="breadcrumb-item"><a href="{{ route('salidas.index') }}">Salidas ({{$l->nombre}})</a></li>
      <li class="breadcrumb-item"><a href="#">Listado</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Salidas ({{$l->nombre}})
            <a class="btn btn-primary icon-btn pull-right" href="{{ route('salidas.createl',$l->id) }}"><i class="fa fa-plus"></i>Registrar salida({{$l->nombre}})</a>
          </h2>
        </div>
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
          <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Descripción</th>
                  <th>Serial</th>
                  <th>Local</th>
                  <th>Tipo</th>
                  <th>cantidad</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($salidas as $key)
                <tr data-toggle="tooltip" data-placement="top"  title="Entregados: {{ $key->entregados }} - Usados: {{ $key->usados }} - Inservibles: {{ $key->inservible }}">
                  <td>{{ $key->producto }}</td>
                  <td>{{ $key->descripcion }}</td>
                  <td>{{ $key->serial }}</td>
                  <td>{{ $key->local }}</td>
                  <td>{{ $key->tipo }}</td>
                  <td>{{ $key->cantidad }}</td>
                  <td>{{ $key->created_at }}</td>
                  <td>
                    <a href="{{ route('salidas.edit',$key->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Salida"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_salida" onclick="eliminar('{{ $key->id }}')"><i class="fa fa-trash"></i></a>
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalles" onclick="detalles('{{ $key->producto }}','{{ $key->descripcion }}','{{ $key->serial }}','{{ $key->local }}','{{ $key->tipo }}','{{ $key->cantidad }}','{{ $key->created_at }}')"><i class="fa fa-eye"></i></a>

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

<div class="bs-component">
  <div class="modal" id="eliminar_salida">
    <div class="modal-dialog modal-dialog_1" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash"></i> Eliminar Salida</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          {!! Form::open(['route' => ['salidas.destroy',1033], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                  <h2>¿Esta seguro que desea eliminar esta salida?</h2>
                <p>Esta acción no se podrá deshacer en el futuro.</p>
                    <input type="hidden" name="id_salida" id="id_salida" >
                    <div class="row form-group">
                        <div class="col col-md-1">
                        </div>
                    </div>
                </div>

          <div class="modal-footer">
            <button class="btn btn-danger" type="submit">Eliminar</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
          </div>          
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

{{-- ver detalles --}}

<div class="bs-component">
  <div class="modal" id="detalles">
    <div class="modal-dialog modal-dialog_1" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-eye"></i> Detalles de la Salida</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <tr>
                    <th>Nombre:</th>
                    <td><span id="producto"></span></td>
                  </tr>
                  <tr>
                    <th>Descripción</th>
                    <td><span id="descripcion"></span></td>
                  </tr>
                  <tr>
                    <th>Serial</th>
                    <td><span id="serial"></span></td>
                  </tr>
                  <tr>
                    <th>Local</th>
                    <td><span id="local"></span></td>
                    <th>Tipo</th>
                    <td><span id="tipo"></span></td>
                  </tr>
                  <tr>
                    <th>Cantidad</th>
                    <td><span id="cantidad"></span></td>
                    <th>Fecha</th>
                    <td><span id="fecha"></span></td>
                  </tr>
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
@endsection
@section('scripts')
<script type="text/javascript">
  function eliminar(id_salida) {
    $("#id_salida").val(id_salida);
  }

  function detalles(producto,descripcion,serial,local,tipo,cantidad,fecha) {
    $("#producto").text(producto);
    $("#descripcion").text(descripcion);
    $("#serial").text(serial);
    $("#local").text(local);
    $("#tipo").text(tipo);
    $("#cantidad").text(cantidad);
    $("#fecha").text(fecha);
    
  }
</script>
@endsection