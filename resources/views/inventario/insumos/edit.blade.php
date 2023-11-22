@extends('layouts.app')
@section('title') Actualización de Insumos @endsection
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
      <li class="breadcrumb-item"><a href="#">Actualización de Insumo</a></li>
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
          <h4>Actualización de Insumo <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
          <div class="tile-body">
            {!! Form::open(['route' => ['insumos.update',$insumo->id], 'method' => 'PUT', 'name' => 'editar_insumo', 'id' => 'editar_insumo', 'data-parsley-validate']) !!}
                    @csrf
              <input type="hidden" name="id_insumo" value="{{$insumo->id}}">
              <div class="row">
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Producto <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: Tambores" name="producto" id="producto" title="Ingrese el nombre del Insumo" required="required" value="{{ $insumo->producto }}">
                  </div>
                </div> 
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label class="control-label">Descripción <b style="color: red;">*</b></label>
                    <textarea class="form-control" name="descripcion" id="descripcion" required="required" placeholder="Ej: material, peso, capacidad, etc" title="Ingrese un descripción del insumo" cols="20" rows="5" >{{ $insumo->descripcion }}</textarea>
                  </div>
                </div>
                </div>
                <div class="row"> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Stock Mínimo </label>
                    <input class="form-control" type="number" placeholder="Ej: 15" name="stock_min" id="stock_min" title="Ingrese el Stock Mínimo del Insumo" value="{{ $insumo->stock_min }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Stock Máximo <b style="color: red;">*</b></label>
                    <input class="form-control" type="number" placeholder="Ej: 15" name="stock_max" id="stock_max" title="Ingrese el Stock Máximo del Insumo" required="required" value="{{ $insumo->stock_max }}">
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-md-12"><hr></div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Actualizar Cantidades en los Locales</h4>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-3">                  
                  <div class="form-group">
                    <input type="hidden" name="id_local" value="{{$insumo->id_local}}">
                    <label class="control-label">Depósito {{$insumo-> nombre}} <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 15" name="deposito" id="deposito" title="Ingrese la cantidad del Insumo en el depósito de {{$insumo->nombre}}" required="required" value="{{$insumo->deposito}}" min="0">
                  </div>
                </div> 
                
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Local {{$insumo->nombre}} <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="local" id="local" title="Ingrese la cantidad del Insumo en el Local de {{$insumo->nombre}}" required="required" value="{{$insumo->local}}" min="0">
                  </div>
                </div> 
              </div>


              
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('insumos.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
