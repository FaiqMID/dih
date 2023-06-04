@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Profile -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- User Profile -->
                <div class="card user-profile">
                    <div class="card-header">
                        <h4 class="float-left mb-0 mt-2">User Profile</h4>
                        <a href="/profile" class="btn btn-outline-secondary btn-100 float-right text-uppercase">Kembali ke Profil</a>
                    </div>
                    <div class="card-header border-top">
                        <h5 class="float-left mb-0 mt-1">Contact Info</h5>
                        <input form="form-1" type="submit" class="btn btn-outline-secondary btn-100 float-right text-uppercase" value="Simpan">
                    </div>
                <form action="{{ route('profile.update') }}" id="form-1" method="POST">
                    @csrf
                    <input type="hidden" name="edit_type" value="contact">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="nama" class="form-label">Nama</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="nama" name="name" placeholder="Nama" value="{{ old('name', $user->name) }}" required>
                            </div>
                        </div>
                        {{-- <div class="row  mb-2">
                            <div class="col-sm-4 text-sm-right">No. Telepon</div>
                            <div class="col-sm-6 field-bg">

                                <div class="row">
                                    <span class="text-muted">
                                        {{ Auth::user()->telephone }}
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="row  mb-2">
                            <div class="col-sm-4 text-sm-right">No. HP</div>
                            <div class="col-sm-6 field-bg">

                                <div class="row">
                                    <span class="text-muted">
                                        {{ Auth::user()->telephone }}
                                    </span>
                                </div>

                            </div>
                        </div> --}}
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="email" class="form-label">Email</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                    </div>
                </form>
                
                    <div class="card-header border-top">
                        <h5 class="float-left mb-0 mt-1">Informasi Pengiriman</h5>
                        <input form="form-2" type="submit" class="btn btn-outline-secondary btn-100 float-right text-uppercase" value="Simpan">
                    </div>
                <form action="{{ route('profile.update') }}" id="form-2" method="POST">
                    @csrf
                    <input type="hidden" name="edit_type" value="address">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="nama-penerima" class="form-label">Nama Penerima</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="nama-penerima" name="nama_penerima" placeholder="Nama Penerima" value="{{ old('nama_penerima', $address->name) }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="alamat" class="form-label">Alamat</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat', $address->address) }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="kota" class="form-label">Kota</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" value="{{ old('kota', $address->city) }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="provinsi" class="form-label">Provinsi</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" value="{{ old('provinsi', $address->province) }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-sm-right"><label for="kode-pos" class="form-label">Kode Pos</label></div>
                            <div class="col-sm-6 field-bg">
                                <input type="text" class="form-control" id="kode-pos" name="kode_pos" placeholder="Kode Pos" value="{{ old('kode_pos', $address->postal_code) }}" required>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <!-- /User Profile -->
            </div>
        </div>
    </div>

@endsection