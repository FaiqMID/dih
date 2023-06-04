@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Keranjang -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
        </ol>
    </nav>

    <!-- Cart -->
    <div class="container">
        <!-- @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-blue-400 rounded">
                <p class="text-white">{{ $message }}</p>
            </div>
        @endif -->
        <h3 class="text-3xl font-bold mt-4">Keranjang</h3>
        <div class="row mt-4">
            <div class="col-9">
                @foreach ($cartItems as $item)
                <div class="row">
                    <div class="card mb-3" style="width: 50rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <a href="/product/{{ $item->id }}"><img style="object-fit:cover;width:100px;height:60px;" src="build/assets/images/items/{{ $item->id }}.jpg" class="rounded" alt="Thumbnail"></a>
                                </div>
                                <div class="col-3">
                                    <div class="row">
                                        <a href="/product/{{ $item->id }}" class="mb-2 font-weight-bold" style="color: inherit;text-decoration:solid">{{ $item->name }}</a>
                                    </div>
                                    <div class="row">
                                        <span class="text-sm font-medium lg:text-base">Rp{{ $item->price }}</span>
                                    </div>
                                </div>
                                <div class="col-6 align-self-center">
                                    <form action="{{ route('cart.update') }}" method="POST" style="display:inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}" class="" >
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-full text-center h-10 text-gray-800 outline-none rounded border border-gray-600 py-1" />
                                        <button class="btn sm-button-reverse">Update</button>
                                    </form>
                                </div>
                                <div class="col-1 align-self-center">
                                    <form action="{{ route('cart.remove') }}" method="POST" style="display:inline">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn sm-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if(!Cart::isEmpty()){
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn sm-button-reverse mb-5">Kosongkan Keranjang</button>
                    </form>
                }   
                @else
                    <h2>Keranjang masih kosong!</h2>  
                    <h4>Silahkan tambahkan barang dulu dari <a href="/catalogue">katalog</a></h4> 
                @endif
            </div>
            <div class="col-3">
                @if(!Cart::isEmpty()){
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="font-weight-bold">Total Harga</p>
                        <div class="font-weight-bold" style="color:#22577A">Rp{{ Cart::getTotal() }}</div>
                        <form action="/checkout" method="POST">
                            <button class="btn sm3-button-reverse mt-3 w-100" type="submit">Beli</button>
                            @csrf
                        </form>
                    </div>
                </div>
                }
                @endif
            </div>
        </div>
    </div>
@endsection