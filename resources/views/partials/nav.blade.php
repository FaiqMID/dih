
<body class="d-flex flex-column min-vh-100">
    <!-- Navigation Bar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('build/assets/images/items/logo.jpg') }}" alt="Logo"></a>
            <form class="d-flex" action="/catalogue/search" method="GET">
                <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search" size="60" value="{{ old('cari') }}">
                <button class="btn sm-button" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#24bbbe" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
            @guest
            <div>
                <a data-toggle="modal" data-target="#myModal1" onclick="">
                    <button class="btn sm-button mr-2" type="button">
                        Masuk
                    </button>    
                </a>
                <a data-toggle="modal" data-target="#myModal2">
                    <button class="btn sm-button" type="button">
                        Daftar
                    </button>    
                </a>
                {{-- <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" 
                                                    onclick="   event.preventDefault();
                                                                document.getElementById('logout-form').submit();"
                            >Logout</a></li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> --}}
            </div>
            @else
            <div>
                <div class="btn-group">
                    <a class="btn sm-button mr-2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-target="#notifs" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg> <span class="badge badge-light">{{ $notifCount ? $notifCount : 0 }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="width: 300px;" id="notifs">
                        <div class="px-3 w-100">
                            <div class="row mt-3">
                                <h5 class="text-start col-5">Notifikasi</h5>
                                <div class="col-6">
                                    <form method="POST" action="{{ route('notif.markAllAsRead') }}">
                                        @csrf
                                        <button class="btn btn-link text-reset" type="submit">
                                            <h6><small>Semua sudah dibaca<span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                    <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                                </svg>
                                            </span></small></h6>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @foreach ($notifs as $notif)
                            <div class="row">
                                <div class="col-12 dropdown-item">
                                    <div class="row">
                                        <p class="text-wrap lh-1 col-12" disabled>{{ $notif->message }}</p>
                                        <div class="col-12 d-flex justify-content-end">
                                            @if(!$notif->is_read)
                                                <form method="POST" action="{{ route('notif.markAsRead') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $notif->id }}">
                                                    <button type="button" class="btn btn-link text-reset" type="submit">
                                                        <h6><small>
                                                            Tandai sudah dibaca
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                                </svg>
                                                            </span></small></h6>
                                                    </button>
                                                </form>
                                            @else
                                            <h6><small>
                                                Sudah dibaca
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                    </svg>
                                                </span>
                                            </small></h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <a class="btn btn-light w-100" href="/notifications">Lihat semuanya</a>
                            </div>
                        </div>
                    </ul>
                </div>
                <a class="btn sm-button mr-2" href="/cart" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg> <span class="badge badge-light">{{ $cartCount ? $cartCount : 0 }}</span>
                </a>
                {{-- <a class="btn sm-button mr-2" href="/profile" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn sm-button">Logout</button>
                </form> --}}
                <div class="btn-group">
                    <a class="btn sm-button mr-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-target="#user">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/profile">Profil</a></li>
                        <li><a class="dropdown-item" href="/orders">Pesanan</a></li>
                        @if (Auth::user()->role == 1)
                        <li><a class="dropdown-item" href="/catalogue/admin">Manajemen Katalog</a></li>
                        @elseif (Auth::user()->role == 2)
                        <li><a class="dropdown-item" href="/orders/list">Manajemen Pesanan</a></li>
                        @endif

                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button class="btn sm-button dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest
        </div>
    </nav>

    <!-- Pop-up Login -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#24bbbe">
                    <img src="build/assets/images/items/logo.jpg" alt="Logo" style="width: 100px; height: 50px; object-fit: cover;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @if(session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <main class="form-signin">
                                    <h1 class="h3 mb-3 fw-normal text-center">Masuk</h1>
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>                                            
                                        </div>

                                        <button class="w-100 btn sm2-button-reverse mt-3" type="submit">Masuk</button>
                                    </form>
                                    <small class="d-block text-center mt-3">Belum daftar? <a style="color:#24bbbe;text-decoration:underline;" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Daftar sekarang</a></small>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up Register -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#24bbbe">
                    <img src="build/assets/images/items/logo.jpg" alt="Logo" style="width: 100px; height: 50px; object-fit: cover;">    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <main class="form-registration">
                                    <h1 class="h3 mb-3 fw-normal text-center">Daftar</h1>
                                    <form action="/register" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <button class="w-100 btn sm2-button-reverse mt-3" type="submit">Daftar</button>
                                    </form>
                                    <small class="d-block text-center mt-3">Sudah daftar? <a style="color:#24bbbe;text-decoration:underline;" data-toggle="modal" data-target="#myModal1" data-dismiss="modal">Masuk</a></small>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    