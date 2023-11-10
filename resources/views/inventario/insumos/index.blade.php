@extends('layouts.app')
@section('title') Insumos @endsection
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
      <li class="breadcrumb-item"><a href="{{ route('insumos.index') }}">Insumos</a></li>
      <li class="breadcrumb-item"><a href="#">Listado</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Insumos
            <a class="btn btn-primary icon-btn pull-right" href="{{ route('insumos.create') }}"><i class="fa fa-plus"></i>Registrar insumo</a>
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
                  <th>Stock_min</th>
                  <th>Stock_max</th>
                  <th>Depósito Guaribe</th>
                  <th>Depósito Valle</th>
                  <th>Local Guaribe</th>
                  <th>Local Valle</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($insumos as $key)
                <tr data-toggle="tooltip" data-placement="top"  title="Entregados: {{ $key->entregados }} - Usados: {{ $key->usados }} - Inservibles: {{ $key->inservible }}">
                  <td>{{ $key->producto }}</td>
                  <td>{{ $key->descripcion }}</td>
                  <td>{{ $key->serial }}</td>
                  <td>{{ $key->stock_min }}</td>
                  <td>{{ $key->stock_max }}</td>
                  <td>{{ $key->deposito_g }}</td>
                  <td>{{ $key->deposito_v }}</td>
                  <td>{{ $key->local_g }}</td>
                  <td>{{ $key->local_v }}</td>
                  <td>
                    <a href="{{ route('insumos.edit',$key->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Insumo"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_insumo" onclick="eliminar('{{ $key->id }}')"><i class="fa fa-trash"></i></a>
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalles" onclick="detalles('{{ $key->producto }}','{{ $key->descripcion }}','{{ $key->serial }}','{{ $key->stock_min }}','{{ $key->stock_max }}','{{ $key->deposito_g }}','{{ $key->deposito_v }}','{{ $key->local_g }}','{{ $key->local_v }}')"><i class="fa fa-eye"></i></a>

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
  <div class="modal" id="eliminar_insumo">
    <div class="modal-dialog modal-dialog_1" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash"></i> Eliminar Insumo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          {!! Form::open(['route' => ['insumos.destroy',1033], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                  <h2>¿Esta seguro que desea eliminar este insumo?</h2>
                <p>Esta acción no se podra deshacer en el futuro.</p>
                    <input type="hidden" name="id_insumo" id="id_insumo" >
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
            <h5 class="modal-title"><i class="fa fa-eye"></i> Detalles del Insumo</h5>
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
                    <th>Stock Mínimo</th>
                    <td><span id="stock_min"></span></td>
                    <th>Stock Máximo</th>
                    <td><span id="stock_max"></span></td>
                  </tr>
                  <tr>
                    <th>Depósito Guaribe</th>
                    <td><span id="deposito_g"></span></td>
                    <th>Depósito Valle</th>
                    <td><span id="deposito_v"></span></td>
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
  function eliminar(id_insumo) {
    $("#id_insumo").val(id_insumo);
  }

  function detalles(producto,descripcion,serial,stock_min,stock_max,deposito_g,deposito_v,local_g,local_v) {
    $("#producto").text(producto);
    $("#descripcion").text(descripcion);
    $("#serial").text(serial);
    $("#stock_min").text(stock_min);
    $("#stock_max").text(stock_max);
    $("#deposito_g").text(deposito_g);
    $("#deposito_v").text(deposito_v);
    $("#local_g").text(local_g);
    $("#local_v").text(local_v);
    
  }
</script>
@endsection