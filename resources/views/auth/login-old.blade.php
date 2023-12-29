@extends('layouts.guest')

@section('title', 'Login')

@section('content')

    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center text-white-50 mt-5">
                        <div>
                            <a href="/" class="d-inline-block auth-logo">
                                <img src="{{ asset('assets/images/logo-white.png') }}" height="70">
                            </a>
                        </div>
                        <br>
                        <p class="fs-15 fw-medium">Komitmen untuk budaya perusahaan yang sehat.</p>
                    </div>
                </div>
            </div>

            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Komitmen.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <!-- Validation Errors -->
                                @if ($errors->any())
                                    <!-- Primary Alert -->
                                    <!-- Primary Alert -->
                                    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
                                        <i class="ri-error-warning-line align-middle label-icon"></i>
                                        @foreach ($errors->all() as $error)
                                            <span>{{ $error }}</span>
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" type="email" name="email" class="form-control"
                                               id="username" placeholder="Enter Email" required autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password" id="password-input"
                                                   class="form-control pe-5" placeholder="Enter password" required
                                                   autocomplete="current-password">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {!! RecaptchaV3::initJs() !!}
                                        {!! RecaptchaV3::field('login') !!}
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-success w-100"
                                                    type="submit">Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

@stop
