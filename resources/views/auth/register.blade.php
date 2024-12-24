@extends('layouts.guest')

@section('content')
    <section style="padding:30px 0px 30px 0px">
        <div class="container d-flex flex-column  flex-lg-row-reverse gap-4  justify-content-center align-items-center">
            <div class="c text-dark">
                <div class="text-white ps-5 ">
                    <h1>Register now</h1>
                    <p class="fw-bold">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero laboriosam in nemo sed
                        sint
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class=" mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm"
                                class="form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                            <div class="submit">
                                <button class="btn ctas" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
