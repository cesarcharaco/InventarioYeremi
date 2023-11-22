@extends('layouts.login')
@section('title') Inicio de sesión @endsection
@section('content')
<section class="material-half-bg">
  <div class="cover"></div>
</section>
<section class="login-content">
  <div class="logo">
    <div class="row">
      <div class="col-md-3">
        <img src="{{ asset('images/moto-01.png') }}" alt="Logo-Yermotos" width="75%" height="75%" class="">    
      </div>
      <div class="col-md-9">
        <br><br>
        <h1><p>Sistema Administrativo | Yermotos Repuestos C.A.</p></h1></div>
    </div>
    
    
  </div>
  <div class="login-box">
    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
      
      <div class="form-group">
        <label class="control-label">Correo electrónico</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group">
        <label class="control-label">Contraseña</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group">
        <div class="utility">
          <div class="animated-checkbox">
          </div>
          <p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidó su contraseña?</a></p>
        </div>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Iniciar sesión') }}</button>
      </div>
    </form>
    <form class="forget-form" action="index.html">
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
      <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input class="form-control" type="text" placeholder="Email">
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
      </div>
      <div class="form-group mt-3">
        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
      </div>
    </form>
  </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
  // Login Page Flipbox control
  $('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
  });
</script>
@endsection
