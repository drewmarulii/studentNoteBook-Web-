@extends('layouts.app')

@section('content')
    <section class="vh-100" style="
        background-image: url('{{asset('image/thai-pattern-black.jpg')}}');  background-size: cover;  background-repeat: no-repeat; height: 70px;
        ">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Sign in</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                <div class="form-outline mb-4">
                                    <input id="email" type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                </form>
                                <hr class="my-4">
                                <p>Create an Account?<a href="/register"> Register here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
