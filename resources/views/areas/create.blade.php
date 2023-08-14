@extends('layouts.app')
@section('title') Registro de Área @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Áreas</h1>
      <p>Sistema de Inventario | Licancabur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ url('areas') }}">Área</a></li>
      <li class="breadcrumb-item"><a href="#">Registro de Área</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Áreas</h2>
        </div><br>
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
          <h4>Registro de Área <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            <form action="{{route('areas.store')}}" method="POST" name="registrar_area" data-parsley-validate>
              @csrf
              <div class="row">
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Área <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: NPI" name="area" id="area" required="required" title="Ingrese el Nombre del Área" value="{{ old('area') }}">
                  </div>
                </div>
                <div class="col-md-4">                  
                  <div class="form-group">
                    <label class="control-label">Gerencia <b style="color: red;">*</b></label>
                    <select name="id_gerencia" id="id_gerencia" title="Seleccione la gerencia a la que pertenecerá el área" class="form-control">
                      @foreach($gerencias as $key)
                        <option value="{{ $key->id }}">{{ $key->gerencia }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>  
                
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ url('areas') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
