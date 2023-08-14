@extends('layouts.app')
@section('title') Actualización de Solicitante @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Solicitantes</h1>
      <p>Sistema de Inventario | Licancabur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ url('solicitantes') }}">Solicitante</a></li>
      <li class="breadcrumb-item"><a href="#">Actualización de Solicitante</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Solicitantes</h2>
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
          <h4>Actualización de Solicitante <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            {!! Form::open(['route' => ['solicitantes.update',$solicitante->id], 'method' => 'PUT', 'name' => 'editar_solicitante', 'id' => 'editar_solicitante', 'data-parsley-validate']) !!}
                    @csrf
              <div class="row">
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Nombres <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: Martin Garrido" name="nombres" id="nombres" required="required" title="Ingrese los Nombres" value="{{ $solicitante->nombres }}">
                  </div>
                </div> 
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">RUT <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: 12345678" name="rut" id="rut" required="required" title="Ingrese EL RUT" value="{{ $solicitante->rut }}">
                  </div>
                </div> 
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Correo electrónico <b style="color: red;">*</b></label>
                    <input class="form-control" type="email" id="email" name="email" title="Ingrese correo electrónico" placeholder="Ej: micorreo@licancabur.cl" required="required" value="{{ $solicitante->email }}">
                  </div>
                </div>               
              </div>
              <div class="row">
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Teléfono<b style="color: red;">*</b></label>
                    <input type="text" name="telefono" id="telefono" required="required" class="form-control" placeholder="Ej: 128128182012" title="Ingrese el número telefónico" value="{{ $solicitante->telefono }}">
                  </div>
                </div>
              </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ url('solicitantes') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
