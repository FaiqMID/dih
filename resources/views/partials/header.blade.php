<header class="section-header">
    <nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
        <div class="container">
            <ul class="navbar-nav d-none d-md-flex mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Delivery</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link"> Call: +0000000000 </a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> English </a>
                    <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
                        <li><a class="dropdown-item" href="#">Arabic</a></li>
                        <li><a class="dropdown-item" href="#">Russian </a></li>
                    </ul>
                </li>
            </ul> <!-- list-inline //  -->

        </div> <!-- container //  -->
    </nav> <!-- header-top-light.// -->
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="#" class="img-wrap"> <img src="build/assets/images/items/logo.png"> </a>
                </div>
                <div class="col-lg-8 col-12 col-sm-12">
                    <form action="#" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-2 col-sm-6 col-12">
                    @guest
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header">
                            <div class="text">
                                <span class="text-muted">Welcome!</span>
                            </div>
                            
                            <a data-toggle="modal" data-target="#myModal1" onclick="">Sign in</a> |
                            <a data-toggle="modal" data-target="#myModal2"> Register</a>
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
                    </div> <!-- widgets-wrap.// -->
                    @else
                    <div>
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header  mr-3">
                                <a href="/cart" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
                                <span class="badge badge-pill badge-danger notify">0</span>
                            </div>

                            <div class="widget-header icontext">
                                <a href="/profile" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>

                            </div>
                            <div class="icontext">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button>Logout</button>
                                </form>
                            </div>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                    @endguest
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> All category</strong></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Foods and Drink</a>
                            <a class="dropdown-item" href="#">Home interior</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Category 1</a>
                            <a class="dropdown-item" href="#">Category 2</a>
                            <a class="dropdown-item" href="#">Category 3</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fashion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Supermarket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Baby &amp Toys</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fitness sport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clothing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Furnitures</a>
                    </li>
                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>
    <div class="container mt-5">
        <h4>
            <!--    Selamat datang   -->
        </h4>
    </div>
</header> <!-- section-header.// -->

<!-- Pop-up Login -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <div class="container mt-4">
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
                                <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="form-floating">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>                                            
                                    </div>

                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                                </form>
                                <small class="d-block text-center mt-3">Not registered? <a data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Register Now!</a></small>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
            <div class="modal-body">
                <div class="container mt-8">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <main class="form-registration">
                                <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                                <form action="/register" method="post">
                                    @csrf
                                    <div class="form-floating">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="telephone" value="0">

                                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                                </form>
                                <small class="d-block text-center mt-3">Already registered? <a data-toggle="modal" data-target="#myModal1" data-dismiss="modal">Login</a></small>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>