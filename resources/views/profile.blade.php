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
                    <form>
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}">
                                </div>
                                @if (Auth::user()->role == 'dosen')
                                <div class="form-group col-md-6 col-12">
                                    <label>NIP</label>
                                    <input type="text" class="form-control" name="nip" value="{{ old('nip', Auth::user()->dosen->nip) }}">
                                </div>
                                @elseif (Auth::user()->role == 'mahasiswa')
                                    <div class="form-group col-md-6 col-12">
                                        <label>NIM</label>
                                        <input type="text" class="form-control" name="nip" value="{{ old('nip', Auth::user()->mahasiswa->nim) }}">
                                    </div>
                                @else
                                    <div class="form-group col-md-6 col-12">
                                        <label>NIM</label>
                                        <input type="text" class="form-control" name="nip" value="{{ old('nip', Auth::user()->token) }}">
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-0 col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                        <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                        <div class="text-muted form-text">
                                            You will get new information about products, offers and promotions
                                        </div>
                                    </div>
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
    </div>
@endsection
@push('scripts')
    <script>
        $('.myTable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    </script>
@endpush
