@extends('layouts.applogin')

@section('content')

<div class="container">
  <div class="m" style="position:absolute; top:20; right:50;">
  Metering Control System
  </div>
<div>
    <form method="POST" action="{{ route('login') }}" class="form-signin">
            @csrf
        <div class="text-center mb-4">
          <img class="mb-4" src="logo.png" width="170px" alt="">
          {{-- <h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
          <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p> --}}
        </div>
  
        <div class="form-label-group">
          <input type="email" id="email" class="form-control" @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}"  required autocomplete="email" name="email"  autofocus>

          <label for="email">USUARIO</label>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
  
        <div class="form-label-group">
          <input type="password" id="password" class="form-control" @error('password') is-invalid @enderror"  placeholder="Password" name="password"  required>

          <label for="password">CONTRASEÑA</label>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
  
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">ENTRAR</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
      </form>

    </div>
   
</div>
@endsection
