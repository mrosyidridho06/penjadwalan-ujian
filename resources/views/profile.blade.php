@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger border-left-danger" role="alert">
                            <ul class="pl-4 my-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" readonly>
                            </div>
                            @if (Auth::user()->role == 'dosen')
                                <div class="form-group col-md-6 col-12">
                                    <label>NIP</label>
                                    <input type="text" class="form-control" name="nip" value="{{ old('nip', Auth::user()->dosen->nip) }}" readonly>
                                </div>
                            @elseif (Auth::user()->role == 'mahasiswa')
                                <div class="form-group col-md-6 col-12">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{ Auth::user()->mahasiswa->nim }}" readonly>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Dosen Pembimbing Utama</label>
                                    <input type="text" class="form-control" name="dosbing1" value="{{ Auth::user()->mahasiswa->dospemSatu->user->name }}" readonly>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Dosen Pembimbing Pendamping</label>
                                    <input type="text" class="form-control" name="dosbing2" value="{{ Auth::user()->mahasiswa->dospemDua->user->name }}" readonly>
                                </div>
                            @endif
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}" readonly>
                            </div>
                        </div>
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-4 col-12">
                                <label>Old Password</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>Confirmation Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
