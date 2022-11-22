@include('layouts.partials.head')
@section('title', 'Login')
<div id="app">
    <section class="section">
        <div class="container md:mt-2 sm:mt-5">
            <div class="row">
                <div class="mt-4 col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand mb-4">
                        <a href="/">
                            <img src="{{ asset('images/unmul.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                        </a>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        @if (Route::has('password.request'))
                                        <div class="float-right">
                                            <a href="{{ route('password.request') }}" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <div class="text-muted text-center">
                                Don't have an account? <a href="{{ route('register') }}">Create One</a>
                            </div>
                        </div>
                    </div>
                    <div class="simple-footer mb-0">
                        Copyright &copy; Farmasi Unmul 2022
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
