@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-sm-12">
                <div class="logo">
                </div>
                <div class="overlay">
                    <h1>FUAD</h1>
                    <p>Fakultas Ushuluddin dan Adab</p> 
                </div>       
            </div>
            <div class="col-lg-5 col-sm-12 login-container">
                <div class="card card-login p-5 shadow">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>{{ __('Silahkan Login!') }}</h1>
                        <div class="form-group input-box">
                            <label>Username</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukkan username" value="{{ old('username') }}" required autocomplete="username" autofocus>
        
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group input-box">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password" required autocomplete="current-password">
        
                            @error('password')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn mt-3">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
