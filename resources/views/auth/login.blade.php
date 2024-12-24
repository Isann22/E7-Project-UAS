@extends('layouts.guest')

@section('content')
    <div class="container d-flex flex-column   flex-lg-row-reverse gap-4  justify-content-center align-items-center">
        <div class="c text-dark">
            <div class="text-white ps-5 ">
                <h1>login now</h1>
                <p class="fw-bold">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero laboriosam in nemo sed sint
                    libero
                    reprehenderit eaque ducimus quo quia.</p>
            </div>
        </div>
        <div class="card d-flex text-white" style="width: 24rem;">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center  mb-1">
                        <div class="link-reg">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                        </div>
                        <div class="link-pass">
                            @if (Route::has('password.request'))
                                <a class="link-danger-hover" href="{{ route('password.request') }}">
                                    {{ __('Lupa password?') }}
                                </a>
                            @endif
                        </div>
                    </div>


                    <div class="mb-1 d-grid my-3" style="height: 40px">
                        <button class="btn ctas" type="submit">Login</button>
                    </div>

            </div>
            <div class="mb-3 text-center">
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Belum mempunyai akun?') }}
                </a>
            </div>
            </form>
        </div>
    </div>

    </div>
@endsection
