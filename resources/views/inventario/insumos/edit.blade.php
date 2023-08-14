@extends('layouts.app')
@section('title') Actualización de Insumos @endsection
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Inventario</h1>
      <p>Sistema de Inventario | Licancabur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Inventario</a></li>
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
                    <label class="control-label">Serial <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: THV123" name="serial" id="serial" title="Ingrese el serial del Insumo" required="required" value="{{ $insumo->serial }}">
                  </div>
                </div> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Modelo </label>
                    <input class="form-control" type="text" placeholder="Ej: THV123" name="modelo" id="modelo" title="Ingrese el modelo del Insumo" value="{{ $insumo->modelo }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Marca <b style="color: red;">*</b></label>
                    <input class="form-control" type="text" placeholder="Ej: Almacenamiento" name="modulo" id="modulo" title="Ingrese el módulo del Insumo" required="required" value="{{ $insumo->modulo }}">
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Gerencia <b style="color: red;">*</b></label>
                    <select name="id_gerencia" id="id_gerencia" class="form-control" title="Seleccione la gerencia a la que será asignado">
                      @foreach($gerencias as $key)
                        <option value="{{ $key->id }}" @if($insumo->id_gerencia==$key->id) selected="selected" @endif >{{ $key->gerencia }}</option>
                      @endforeach
                    </select>
                  </div>
                </div> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Ubicación <b style="color: red;">*</b></label>
                    <input class="form-control" type="text"  placeholder="Ej: Pabellón 3" name="ubicacion" id="ubicacion" title="Ingrese la Ubicación del Insumo" required="required" value="{{ $insumo->ubicacion }}">
                  </div>
                </div> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Existencia <b style="color: red;">*</b> <small>(Stock)</small></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="existencia" id="existencia" title="Ingrese la existencia del Insumo" required="required" value="{{ $insumo->existencia }}">
                  </div>
                </div> 
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">En Almacén <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="in_almacen" id="in_almacen" title="Ingrese la cantidad actual en el Almacén, del Insumo" required="required" value="{{ $insumo->in_almacen }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Fuera de Almacén <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="out_almacen" id="out_almacen" title="Ingrese la cantidad actual fuera del Almacén, del Insumo" required="required" value="{{ $insumo->out_almacen }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Disponibles <b style="color: red;">*</b></label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="disponibles" id="disponibles" title="Ingrese la cantidad disponible del Insumo" required="required" value="{{ $insumo->disponibles }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Entregados </label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="entregados" id="entregados" title="Ingrese la cantidad actual fuera del Almacén, del Insumo"value="{{ $insumo->entregados }}">
                  </div>
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <label class="control-label">Usados </label>
                    <input class="form-control" type="number"  placeholder="Ej: 300" name="usados" id="usados" title="Ingrese la cantidad del insumo que está en reparación" value="{{ $insumo->usados }}">
                  </div>
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
