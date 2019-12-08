@extends('autenticacion::layouts.app')

@section('content')
<main class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>Renap</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{__('Inicia sesión')}}</p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- <form action="{{ route('login') }}" method="post"> --}}
                {{ Form::open(['route' => 'login']) }}
                    <div class="input-group mb-3">
                        {{-- <input type="cui" class="form-control" placeholder="cui"> --}}
                        <input id="cui" type="text"  placeholder="CUI" class="form-control @error('cui') is-invalid @enderror" name="cui" value="{{ old('cui') }}" required autocomplete="cui" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('cui')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">

                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('Inicia Sesión')}}</button>

                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                    @endif
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</main>
@endsection
