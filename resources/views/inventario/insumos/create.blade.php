@extends('layouts.app')
@section('title') Registro de Insumos @endsection
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
      <li class="breadcrumb-item"><a href="{{ route('insumos.index') }}">Insumos</a></li>
      <li class="breadcrumb-item"><a href="#">Registro de Insumo</a></li>
    </ul>
  </div>
  <div class="tile mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 class="mb-3 line-head" id="indicators">Insumos</h2><br>
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
          <h4>Registro de Insumo <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            <form action="{{route('insumos.store')}}" method="POST" name="registrar_insumo" data-parsley-validate>
              @csrf
              <div class="row">
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Producto <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: Tambores" name="producto" id="producto" title="Ingrese el nombre del Insumo" required="required" value="{{ old('producto') }}">
                  </div>
                </div> 
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label class="control-label">Descripción <b style="color: red;">*</b></label>
                    <textarea class="form-control" name="descripcion" id="descripcion" required="required" placeholder="Ej: material, peso, capacidad, etc" title="Ingrese un descripción del insumo" cols="20" rows="5" ></textarea>
                  </div>
                </div>
                <div class="row"> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Stock Mínimo </label>
                    <input class="form-control" type="number" placeholder="Ej: 15" name="stock_min" id="stock_min" title="Ingrese el Stock Mínimo del Insumo" value="{{ old('stock_min') }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Stock Máximo <b style="color: red;">*</b></label>
                    <input class="form-control" type="number" placeholder="Ej: 15" name="stock_max" id="stock_max" title="Ingrese el módulo del Insumo" required="required" value="{{ old('stock_max') }}">
                  </div>
                </div> 
              </div>
              <div class="row">
                
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Depósito Guaribe <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 15" name="deposito_g" id="deposito_g" title="Ingrese la cantidad del Insumo en el depósito de Guaribe" required="required" value="{{ old('deposito_g') }}">
                  </div>
                </div> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Depósito Valle <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="deposito_v" id="deposito_v" title="Ingrese la cantidad del Insumo en el depósito del Valle" required="required" value="{{ old('deposito_v') }}">
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Local Guaribe <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="local_g" id="local_g" title="Ingrese la cantidad del Insumo en el Local de Guaribe" required="required" value="{{ old('local_g') }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Local Valle <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="local_v" id="local_v" title="Ingrese la cantidad del Insumo en el Local del Valle" required="required" value="{{ old('local_v') }}">
                  </div>
                </div>
              </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('insumos.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
