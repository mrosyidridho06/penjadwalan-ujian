{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot>

        <div class="mb-4 text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
@include('layouts.partials.head')
<!DOCTYPE html>
<html lang="en">
    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <a href="/">
                                    <img src="{{ asset('images/unmul.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                                </a>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Reset Password</h4>
                                </div>

                                <div class="card-body">
                                    <p class="text-muted">We will send a link to reset your password</p>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <!-- Email Address -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" :value="old('email')" tabindex="1" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Reset Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer">
                                Copyright &copy; Farmasi 2022
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
