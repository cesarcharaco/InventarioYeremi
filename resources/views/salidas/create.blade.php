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
      <li class="breadcrumb-item"><a href="{{ route('salidas.index') }}">Salidas</a></li>
      <li class="breadcrumb-item"><a href="#">Registro de Salida</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Salidas</h2><br>
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
          <h4>Registro de Salida <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            <form action="{{route('salidas.store')}}" method="POST" name="registrar_insumo" data-parsley-validate>
              @csrf
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-4 col-xs-12">                  
                  <div class="form-group">
                    <label class="control-label"> Insumos <b style="color: red;">*</b></label><br>
                    <select name="id_insumo[]" id="id_insumo" class="form-control select2" title="Seleccione el insumo" multiple="multiple">
                      @foreach($insumos as $key)
                      @if($local=="Guaribe")
                        <option value="{{ $key->id }}">{{ $key->producto }} |  Serial: {{ $key->serial }} | {{ $key->descripción }} | L. Guaribe: <b>{{ $key->local_g }}<b>  | D. Guaribe: <b>{{ $key->deposito_g }}<b></option>
                      @else
                        <option value="{{ $key->id }}">{{ $key->producto }} |  Serial: {{ $key->serial }} | {{ $key->descripción }} | L. El Valle: <b>{{ $key->local_v }}<b>  | D. El Valle: <b>{{ $key->deposito_v }}<b></option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row"> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Local</label>
                    <select name="local" id="local" class="form-control" title="Seleccione el local" required="required">
                      
                        <option value="0">Seleccione el local</option>
                      
                      <option value="Guaribe">Guaribe</option>
                      <option value="El Valle">El Valle</option>
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Tipo<b style="color: red;">*</b></label>
                    <select name="tipo" id="tipo" class="form-control" title="Seleccione el tipo de salida" required="required">
                      
                        <option value="0">Seleccione el Tipo de Salida</option>
                      
                      <option value="Venta">Venta</option>
                      <option value="Donación">Donación</option>
                      <option value="Fiao">Fiao</option>
                      
                    </select>
                  </div>
                </div> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Cantidad<b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 15" name="cantidad" id="cantidad" title="Ingrese la cantidad de Salida del Insumo" required="required" value="{{ old('cantidad') }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">                  
                  <div class="form-group">
                    <label class="control-label">Observación
                    <textarea class="form-control" placeholder="Ej: El producto fue extraido del depósito" name="observacion" id="cantidad" title="Ingrese una observación de la Salida del Insumo">{{ old('cantidad') }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('salidas.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
