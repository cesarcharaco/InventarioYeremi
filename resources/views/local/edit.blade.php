@extends('layouts.app')
@section('title') Actualización de Local @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Local</h1>
      <p>Sistema de Inventario | Licancabur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ url('local') }}">Local</a></li>
      <li class="breadcrumb-item"><a href="#">Actualización de Local</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Local</h2>
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
          <h4>Actualización de Local <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            {!! Form::open(['route' => ['local.update',$local->id], 'method' => 'PUT', 'name' => 'editar_local', 'id' => 'editar_local', 'data-parsley-validate']) !!}
                    @csrf
              <div class="row">
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Nombre <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: Guaribe" name="nombre" id="nombre" required="required" title="Ingrese el Nombre" value="{{ $local->nombre }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="estado"><b>Estado</b> <b style="color: red;">*</b></label>
                      <input type="hidden" id="id_local2" name="id_local">
                      <select name="estado" id="estado" class="form-control" required="required">
                          <option value="Activo" @if({{$local->estado=="Activo"}}) selected="selected" @endif >Activo</option>
                          <option value="Inactivo" @if({{$local->estado=="Inactivo"}}) selected="selected" @endif >Inactivo</option>                       
                      </select>
                  </div>
                </div>  
              </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ url('local') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
