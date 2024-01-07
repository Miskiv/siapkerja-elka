@extends('layouts.guest')
@section('title', 'Register')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form action="{{ route('register') }}" class="user" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="name" class="form-control form-control-user"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="nim" class="form-control form-control-user"
                                    placeholder="NIM" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                placeholder="Email" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" id="password" class="form-control form-control-user"
                                    placeholder="Password" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" id="repeatPassword" class="form-control form-control-user"
                                    placeholder="Repeat Password" required>
                                <small id="passwordMatch" class="text-danger d-none">Passwords do not match</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                        <hr>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<script>
    const password = document.getElementById('password');
    const repeatPassword = document.getElementById('repeatPassword');
    const passwordMatch = document.getElementById('passwordMatch');

    function validatePassword() {
        if (password.value !== repeatPassword.value) {
            passwordMatch.classList.remove('d-none');
            return false;
        } else {
            passwordMatch.classList.add('d-none');
            return true;
        }
    }

    repeatPassword.addEventListener('keyup', validatePassword);
</script>
    
@endpush