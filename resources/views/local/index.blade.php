@extends('layouts.app')
@section('title') Local @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Local</h1>
      <p>Sistema Administrativo | Yermotos Repuestos C.A.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="">Local</a></li>
      <li class="breadcrumb-item"><a href="">Listado</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Local
            <a class="btn btn-primary icon-btn pull-right" href="{{ url('local/create') }}"><i class="fa fa-plus"></i>Registrar Local</a>
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
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($local as $key)
                <tr>
                  <td>{{ $key->nombre }}</td>
                  <td>
                    @if($key->estado=="Activo")
                    <span class="badge badge-success">{{ $key->estado }}</span>
                    @elseif($key->estado=="Inactivo")
                    <span class="badge badge-danger">{{ $key->estado }}</span>
                    @endif
                  </td>

                  <td>
                    <a href="{{ route('local.edit',$key->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Local"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_Local" onclick="eliminar('{{ $key->id }}')"><i class="fa fa-trash"></i></a>
                    <a href="#" data-toggle="tooltip" class="btn btn-secondary btn-sm" data-placement="top" title="Cambiar estado del Local" onclick="estado('{{ $key->id }}')" id="cambiar_estado">
                    <i class="fa fa-lock" data-toggle="modal" data-target="#myModaltwo"></i>
                </a>
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
  <div class="modal" id="eliminar_Local">
    <div class="modal-dialog modal-dialog_1" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash"></i> Eliminar Local</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          {!! Form::open(['route' => ['local.destroy',1033], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                  <h2>¿Esta seguro que desea eliminar este local?</h2>
                <p>Esta acción no se podra deshacer en el futuro.</p>
                    <input type="hidden" name="id_local" id="id_local1" >
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

<div class="modal fade" id="myModaltwo" role="dialog">
    <div class="modal-dialog  modal-dialog_1 modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-lock"></i> Cambiar Estado del Local</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(['route' => ['local.cambiar_estado'], 'method' => 'POST', 'name' => 'cambiar_estado', 'id' => 'cambiar_estado', 'data-parsley-validate']) !!}
            @csrf
            <div class="modal-body">
                {{-- <h2>Cambiar de estado del Local</h2> --}}
                <p>¿Estas seguro que desea cambiar de estado a este solicitante?.</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="estado"><b>Estado</b> <b style="color: red;">*</b></label>
                            <input type="hidden" id="id_local2" name="id_local">
                            <select name="estado" id="estado" class="form-control" required="required">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>                       
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Cambiar estado</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  function eliminar(id_local) {
    $("#id_local1").val(id_local);
  }

  function estado(id_local) {
    $("#id_local2").val(id_local);
  }

</script>
@endsection