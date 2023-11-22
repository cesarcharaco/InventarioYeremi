<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img style="border-radius: 0px !important" class="app-sidebar__user-avatar" src="{{ asset('images/logo-01.png') }}"  alt="Logo de la empresa" width="90%" height="90%">
    <div>
      {{-- <img class="app-sidebar__user-avatar" src="{{ asset('images/logo_3.png') }}" style="border-radius: 5px;" width="105px" height="106px" alt="Logo de la empresa"> --}}
      <!-- <p class="app-sidebar__user-name">SAYER</p>
      <p class="app-sidebar__user-designation">Yermotos Repuestos C.A.</p> -->
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{ Request::is('home') ? 'active':'' }}" href="{{ url('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Menu</span></a></li>
    <li class="treeview {{ Request::is('inventario*') ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">SAYER</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('insumos') ? 'active':'' }}" href="{{ route('insumos.index') }}"><i class="icon fa fa-circle-o"></i> Insumos</a></li>
        <li><a class="treeview-item {{ Request::is('incidencias') ? 'active':'' }}" href="{{ route('incidencias.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> Incidencias</a></li>
      </ul>
    </li>
    <li class="treeview {{ Request::is('salidas_l*') ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Listas de Salidas </span><i class="treeview-indicator fa fa-angle-right"></i></a>
      @php $locales=locales(); @endphp
      <ul class="treeview-menu">
        @foreach($locales as $l)
        <li><a class="treeview-item {{ Request::is('local') ? 'active':'' }}" href="{{ route('salidas.listar',$l->id) }}"><i class="icon fa fa-circle-o"></i> {{$l->nombre}}</a></li>
        <!-- <li><a class="treeview-item {{ Request::is('valle') ? 'active':'' }}" href="{{ route('salidas.index2') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> El Valle</a></li> -->
        @endforeach
      </ul>
    </li>




    <li><a class="app-menu__item {{ Request::is('salidas') ? 'active':'' }}" href="{{ route('seleccionar_local') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Salidas</span></a></li>
    <li><a class="app-menu__item {{ Request::is('solicitantes') ? 'active':'' }}" href="{{ route('solicitantes.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Solicitantes</span></a></li>

    <li><a class="app-menu__item {{ Request::is('local') ? 'active':'' }}" href="{{ route('local.index') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Local</span></a></li>

    <li><a class="app-menu__item {{ Request::is('graficas') ? 'active':'' }}" href="{{ route('reportes.index') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gráficas</span></a></li>
    <li class="treeview {{ Request::is('configuraciones*') ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Configuraciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('gerencias') ? 'active':'' }}" href="{{ route('incidencias.historial') }}"><i class="icon fa fa-circle-o"></i> Historial Incidencias</a></li>
        <!-- <li><a class="treeview-item {{ Request::is('areas') ? 'active':'' }}" href="{{ route('areas.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> Áreas</a></li> -->
      </ul>
    </li>
  </ul>
</aside>