@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Produk -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/catalogue">Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
        </ol>
    </nav>

    <!-- Product Detail -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <img style="object-fit:cover;width:350px;height:175px;" src="{{ asset('build/assets/images/items/' . $product->image) }}">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-gray-700 uppercase mt-3">Rp{{ $product->product_price }}/kg</h3>
                    </div>
                    <form action="{{route('cart.store') }}" id="q-form" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->product_name }}" name="name">
                        <input type="hidden" value="{{ $product->product_price }}" name="price">
                        {{-- <input type="hidden" value="{{ $product->image }}"  name="image"> --}}
                        
                        <input type="number" name="quantity" value="1" class="w-full text-center h-10 text-gray-800 outline-none rounded border border-gray-600 py-3" />
                        <input type="hidden" name="type" value="">
                    </form>
                </div>
            </div>
            <div class="col-4 align-self-center">
                <div class="flex items-center mb-5">
                    <h3 class="text-gray-700 uppercase">{{ $product->product_name }}</h3>
                    <p class="text-gray-700 uppercase">{{ $product->product_description }}</p>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 21rem;">
                    <div class="card-body">
                        <p class="font-weight-bold">Total Harga</p>
                        <p class="font-weight-bold" style="color:#22577A">Rp{{ $product->product_price}}</p>
                        {{-- <input class="btn sm3-button-reverse w-100 mb-3" type="submit" form="q-form" name="checkout_type" value="Beli Langsung"> --}}
                        <input class="btn sm3-button-reverse w-100" type="submit" form="q-form" name="checkout_type" value="Tambah ke Keranjang">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection