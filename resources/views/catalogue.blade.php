@extends('layouts.app')

@section('content')

    <!-- Breadcrumb Katalog -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Katalog</li>
        </ol>
    </nav>

    <!-- Filter Catalogue -->
    <div class="container mt-2 mb-4">
        <div class="row">
            <div class="col-md-24">
                <p class="font-weight-bold mt-3">Urutkan</p>
                <div class="card" style="width: 12rem;">
                    <div class="card-body">
                        <form action="/catalogue/sort" method="GET" style="display:inline">
                            <button class="btn sm-button w-100 text-left mb-2" type="submit" name="sort" value="name">Nama</button>
                            <button class="btn sm-button w-100 text-left mb-2" type="submit" name="sort" value="latest">Terbaru</button>
                            <button class="btn sm-button w-100 text-left mb-2" type="submit" name="sort" value="priceDesc">Harga Tertinggi</button>
                            <button class="btn sm-button w-100 text-left mb-2" type="submit" name="sort" value="priceAsc">Harga Terendah</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-96">
                @if($products->total() != 0)
                    <div class="mt-3 mb-3">Menampilkan {{ $products->firstItem() }}-{{ $products->lastItem() }} produk dari total {{ $products->total() }}</div>
                @else
                    <p class="mt-3">Produk tidak ditemukan.</p>
                @endif
                <!-- Card Product Catalogue -->
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-24">
                        <div class="card mb-3" style="width: 10rem;">
                            <a href="/product/{{ $product->id }}"> <img class="card-img-top" src="{{ asset('build/assets/images/items/' . $product->image) }}"> </a>
                            <div class="card-body">
                                <a href="/product/{{ $product->id }}" class="card-title font-weight-bold" style="color: inherit;text-decoration:solid">{{ $product->product_name }}</a>
                                <p class="card-text">Rp{{ $product->product_price }}/kg</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-3">
                    <div class="d-flex justify-content-end"">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection