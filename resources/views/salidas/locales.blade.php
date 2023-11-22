@extends('layouts.app')
@section('title') Registro de Salidas @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> SAYER</h1>
      <p>Sistema Administrativo | Yermotos Repuestos C.A.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">SAYER</a></li>
      <li class="breadcrumb-item"><a href="{{ route('salidas.index') }}">Salidas (Seleccionar Local)</a></li>
      <!-- <li class="breadcrumb-item"><a href="#">Registro de Salida</a></li> -->
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Seleccionar local para Salidas</h2><br>
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
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h4>Seleccionar Local <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            <form action="{{route('salidas.create2')}}" method="POST" name="registrar_insumo" data-parsley-validate>
              @csrf
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-4 col-xs-12">                  
                  <div class="form-group">
                    <label class="control-label"> Locales <b style="color: red;">*</b></label><br>
                    <select name="id_local" id="id_local" class="form-control select2" title="Seleccione el Local">
                      @foreach($locales as $key)
                      
                        <option value="{{ $key->id }}">{{ $key->nombre }} 
                        </option>
                      
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Buscar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('salidas.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
