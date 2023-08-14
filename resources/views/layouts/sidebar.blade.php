<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img style="border-radius: 0px !important" class="app-sidebar__user-avatar" src="{{ asset('images/logo_1.png') }}"  alt="Logo de la empresa">
    <div>
      {{-- <img class="app-sidebar__user-avatar" src="{{ asset('images/logo_3.png') }}" style="border-radius: 5px;" width="105px" height="106px" alt="Logo de la empresa"> --}}
      <p class="app-sidebar__user-name">INVSyst</p>
      <p class="app-sidebar__user-designation">Inventario</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{ Request::is('home') ? 'active':'' }}" href="{{ url('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tablero</span></a></li>
    <li class="treeview {{ Request::is('inventario*') ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Inventario</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('insumos') ? 'active':'' }}" href="{{ route('insumos.index') }}"><i class="icon fa fa-circle-o"></i> Insumos</a></li>
        <li><a class="treeview-item {{ Request::is('prestamos') ? 'active':'' }}" href="{{ route('prestamos.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> Préstamo</a></li>
        <li><a class="treeview-item {{ Request::is('incidencias') ? 'active':'' }}" href="{{ route('incidencias.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> Incidencias</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item {{ Request::is('solicitantes') ? 'active':'' }}" href="{{ route('solicitantes.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Solicitantes</span></a></li>
    <li><a class="app-menu__item {{ Request::is('graficas') ? 'active':'' }}" href="{{ route('reportes.index') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gráficas</span></a></li>
    <li class="treeview {{ Request::is('configuraciones*') ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Configuraciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('gerencias') ? 'active':'' }}" href="{{ route('gerencias.index') }}"><i class="icon fa fa-circle-o"></i> Gerencias</a></li>
        <li><a class="treeview-item {{ Request::is('areas') ? 'active':'' }}" href="{{ route('areas.index') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> Áreas</a></li>
      </ul>
    </li>
  </ul>
</aside>