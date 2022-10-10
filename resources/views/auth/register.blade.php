<x-guest-layout>
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
</x-guest-layout>
