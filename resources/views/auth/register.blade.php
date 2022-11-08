{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="nim" :value="__('Nim')" />

                <x-input id="nim" class="" type="text" name="nim" :value="old('nim')" required />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="prodi" :value="__('Prodi')" />
                <select name="prodi" id="prodi" class="form-control">
                    <option value="" selected>Pilih Prodi</option>
                    @foreach ($prodi as $item)
                    <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="dosen" :value="__('Dosen Pembimbing Utama')" />
                <select name="dospem_satu" id="dosen" class="form-control">
                    <option value="" selected>Pilih Dosen</option>
                    @foreach ($dosen as $item)
                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="dosen" :value="__('Dosen Pembimbing Pendamping')" />
                <select name="dospem_dua" id="dosen" class="form-control">
                    <option value="" selected>Pilih Dosen</option>
                    @foreach ($dosen as $item)
                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="angkatan" :value="__('Angkatan')" />
                <select name="angkatan" class="form-control">
                    <option>Select Year</option>
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                </select>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="alamat" :value="__('Alamat')" />

                <x-input id="alamat" class="" type="alamat" name="alamat" :value="old('alamat')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class=""
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class=""
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a class="text-muted" href="{{ route('login') }}" style="margin-right: 15px; margin-top: 15px;">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
@include('layouts.partials.head')
@section('title', 'Register')
<body>
    <div id="app">
        <section class="section">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <a href="/">
                                <img src="{{ asset('images/unmul.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                            </a>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
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
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input id="name" type="name" class="form-control" value="{{ old('name') }}" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" name="nim" required maxlength="10">
                                                @error('nim')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Prodi</label>
                                            <select class="form-control selectric" name="prodi" required>
                                                <option value="" selected>Pilih Prodi</option>
                                                @foreach ($prodi as $item)
                                                @if (old('prodi') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->jurusan }}</option>
                                                @else
                                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Angkatan</label>
                                            <select class="form-control selectric" name="angkatan" required>
                                                <?php
                                                $year = date('Y');
                                                $min = $year - 10;
                                                $max = $year;
                                                for( $i=$max; $i>=$min; $i-- ) {
                                                echo '<option value='.$i.'>'.$i.'</option>';
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Dosen Pembimbing Utama</label>
                                            <select class="form-control selectric" name="dospem_satu" required>
                                                <option value="" selected>Pilih Dosen</option>
                                                @foreach ($dosen as $item)
                                                    @if(old('dospem_satu') == $item->id)
                                                        <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Dosen Pembimbing Pendamping</label>
                                            <select class="form-control selectric" name="dospem_dua" required>
                                                <option value="" selected>Pilih Dosen</option>
                                                @foreach ($dosen as $item)
                                                    @if(old('dospem_dua') == $item->id)
                                                        <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input"
                                                id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms
                                                and conditions</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Farmasi Unmul 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('layouts.partials.javascript')
</body>
</body>
