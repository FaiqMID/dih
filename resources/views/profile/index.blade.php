@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Profile -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- User Profile -->
                <div class="card user-profile">
                    <div class="card-header">
                        <h4 class="float-left mb-0 mt-2">User Profile</h4>
                        <a href="/profile/edit" class="btn btn-outline-secondary btn-100 float-right text-uppercase">Edit</a>
                    </div>
                    <div class="card-header border-top">
                        <h5 class="float-left mb-0 mt-1">Contact Info</h5>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 text-sm-right">Nama</div>
                            <div class="col-sm-6 field-bg">
                                <span class="text-muted">{{ $user->name }}</span>
                            </div>
                        </div>
                        {{-- <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Phone no.</div>
                            <div class="col-sm-6 field-bg">

                                <div class="row">
                                    <span class="text-muted">
                                        {{ Auth::user()->telephone }}
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Mobile no.</div>
                            <div class="col-sm-6 field-bg">

                                <div class="row">
                                    <span class="text-muted">
                                        {{ Auth::user()->telephone }}
                                    </span>
                                </div>

                            </div>
                        </div> --}}
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Email</div>
                            <div class="col-sm-6 field-bg">

                                <div class="row">
                                    <span class="text-muted">
                                        {{ $user->email }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-header border-top">
                        <h5 class="float-left mb-0 mt-1">Informasi Pengiriman</h5>
                    </div>

                    <div class="card-body">
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Nama Penerima</div>
                            <div class="col-sm-6 field-bg">
                                <span class="text-muted">
                                    {{ $address->name }}
                                </span>
                            </div>
                        </div>
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Alamat</div>
                            <div class="col-sm-6 field-bg">
                                <span class="text-muted">
                                    {{ $address->address }}
                                </span>
                            </div>
                        </div>
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Kota</div>
                            <div class="col-sm-6 field-bg">
                                <span class="text-muted">
                                    {{ $address->city }}
                                </span>
                            </div>
                        </div>
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Provinsi</div>
                            <div class="col-sm-6 field-bg">
                                <span class="text-muted">
                                    {{ $address->province }}
                                </span>
                            </div>
                        </div>
                        <div class="row  mb-2">
                            <div class="col-sm-6 text-sm-right">Kode Pos</div>
                            <div class="col-sm-6 field-bg">
                                <span class="text-muted">
                                    {{ $address->postal_code }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Profile -->
            </div>
        </div>
    </div>

@endsection