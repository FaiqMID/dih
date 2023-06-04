@extends('layouts.app')

@section('content')
    @guest
    @else
        <div class="container mt-4">
            <p class="font-weight-bold">Selamat datang {{ Auth::user()->name }}, selamat berbelanja!</p>
        </div>
    @endguest
    <!-- Carousel Banner Landing Page -->
    <div class="container mt-2">
        <div class="d-flex justify-content-center">
            <div id="carouselBannerLanding" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselBannerLanding" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselBannerLanding" data-slide-to="1"></li>
                    <li data-target="#carouselBannerLanding" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block" src="build/assets/images/banners/1.jpg" alt="First slide" >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="build/assets/images/banners/2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="build/assets/images/banners/3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselBannerLanding" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselBannerLanding" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Card Product Landing Page -->
    <div class="container mt-4 mb-4">
        <a href="/catalogue" class="btn sm-button-reverse float-right">Lihat Semua</a>
        <h3 class="mb-4">Produk Segar</h3>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-2">
                <div class="card" style="width: 10rem;">
                    <a href="/product/{{ $product->id }}"> <img class="card-img-top" src="build/assets/images/items/{{ $product->image }}"> </a>
                    <div class="card-body">
                        <a href="/product/{{ $product->id }}" class="card-title font-weight-bold" style="color: inherit;text-decoration:solid">{{ $product->product_name }}</a>
                        <p class="card-text">Rp{{ $product->product_price }}/kg</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection