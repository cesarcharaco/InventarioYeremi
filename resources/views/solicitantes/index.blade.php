@extends('layouts.app')
@section('title') Solicitantes @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Solicitantes</h1>
      <p>Sistema Administrativo | Yermotos Repuestos C.A.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="">Solicitantes</a></li>
      <li class="breadcrumb-item"><a href="">Listado</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Solicitantes
            <a class="btn btn-primary icon-btn pull-right" href="{{ url('solicitantes/create') }}"><i class="fa fa-plus"></i>Registrar Solicitante</a>
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
                  <th>Nombres</th>
                  <th>RUT</th>
                  <th>Email</th>
                  <th>Télefono</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($solicitantes as $key)
                <tr>
                  <td>{{ $key->nombres }}</td>
                  <td>{{ $key->rut }}</td>
                  <td>{{ $key->email }}</td>
                  <td>{{ $key->telefono }}</td>
                  <td>
                    @if($key->status=="Activo")
                    <span class="badge badge-success">{{ $key->status }}</span>
                    @elseif($key->status=="Inactivo")
                    <span class="badge badge-danger">{{ $key->status }}</span>
                    @elseif($key->status=="En Mora")
                    <span class="badge badge-warning">{{ $key->status }}</span>
                    @elseif($key->status=="Solvente")
                    <span class="badge badge-info">{{ $key->status }}</span>
                    @endif
                  </td>

                  <td>
                    <a href="{{ route('solicitantes.edit',$key->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Solicitante"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_Solicitante" onclick="eliminar('{{ $key->id }}')"><i class="fa fa-trash"></i></a>
                    <a href="#" data-toggle="tooltip" class="btn btn-secondary btn-sm" data-placement="top" title="Cambiar status de Solicitante" onclick="status('{{ $key->id }}')" id="cambiar_status">
                    <i class="fa fa-lock" data-toggle="modal" data-target="#myModaltwo"></i>
                </a>
                  </td>
                </tr>
                @endforeach
                {{-- <tr>
                  <td>Carlos Vega</td>
                  <td>87654321</td>
                  <td>carlosvega@gmail.com</td>
                  <td>Empleado</td>
                  <td><span class="badge badge-success">Activo</span></td>
                  <td>
                    <a href="" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Solicitante"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_Solicitante"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Luis Pérez</td>
                  <td>5489654</td>
                  <td>luisperez@gmail.com</td>
                  <td>Empleado</td>
                  <td><span class="badge badge-success">Activo</span></td>
                  <td>
                    <a href="" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Solicitante"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_Solicitante"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>José Teran</td>
                  <td>25487542</td>
                  <td>joseteran@gmail.com</td>
                  <td>Empleado</td>
                  <td><span class="badge badge-danger">Inhabilitado</span></td>
                  <td>
                    <a href="" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Solicitante"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_Solicitante"><i class="fa fa-trash"></i></button>
                  </td>
                </tr> --}}
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
  <div class="modal" id="eliminar_Solicitante">
    <div class="modal-dialog modal-dialog_1" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash"></i> Eliminar Solicitante</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          {!! Form::open(['route' => ['solicitantes.destroy',1033], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                  <h2>¿Esta seguro que desea eliminar este solicitante?</h2>
                <p>Esta acción no se podra deshacer en el futuro.</p>
                    <input type="hidden" name="id_solicitante" id="id_solicitante1" >
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
              <h5 class="modal-title"><i class="fa fa-lock"></i> Cambiar Status de Solicitante</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(['route' => ['solicitantes.cambiar_status'], 'method' => 'POST', 'name' => 'cambiar_status', 'id' => 'cambiar_status', 'data-parsley-validate']) !!}
            @csrf
            <div class="modal-body">
                {{-- <h2>Cambiar de status del Solicitante</h2> --}}
                <p>¿Estas seguro que desea cambiar de status a este solicitante?.</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status"><b>Status</b> <b style="color: red;">*</b></label>
                            <input type="hidden" id="id_solicitante2" name="id_solicitante">
                            <select name="status" id="status" class="form-control" required="required">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="En Mora">En Mora</option>
                                <option value="Solvente">Solvente</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Cambiar status</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  function eliminar(id_solicitante) {
    $("#id_solicitante1").val(id_solicitante);
  }

  function status(id_solicitante) {
    $("#id_solicitante2").val(id_solicitante);
  }

</script>
@endsection