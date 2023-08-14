@extends('layouts.app')
@section('title') Áreas @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Áreas</h1>
      <p>Sistema de Inventario | Licancabur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="">Áreas</a></li>
      <li class="breadcrumb-item"><a href="">Listado</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Áreas
            <a class="btn btn-primary icon-btn pull-right" href="{{ url('areas/create') }}"><i class="fa fa-plus"></i>Registrar Área</a>
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
                  <th>Área</th>
                  <th>Gerencia</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($areas as $key)
                <tr>
                  <td>{{ $key->area }}</td>
                  <td>{{ $key->gerencias->gerencia }}</td>
                  <td>
                    <a href="{{ route('areas.edit',$key->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar Área"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_area" onclick="eliminar('{{ $key->id }}')"><i class="fa fa-trash"></i></a>
                   
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
  <div class="modal" id="eliminar_area">
    <div class="modal-dialog modal-dialog_1" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash"></i> Eliminar Área</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          {!! Form::open(['route' => ['areas.destroy',1033], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                  <h2>¿Esta seguro que desea eliminar esta Área?</h2>
                <p>Esta acción no se podra deshacer en el futuro.</p>
                    <input type="hidden" name="id_area" id="id_area1" >
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

@endsection
@section('scripts')
<script type="text/javascript">
  function eliminar(id_area) {
    $("#id_area1").val(id_area);
  }

</script>
@endsection