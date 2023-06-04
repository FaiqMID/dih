@extends('layouts.app')

@section('content')
<!-- Breadcrumb Order -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Order</a></li>
    </ol>
</nav>

<div class="container">
    @if (!empty($orders))
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <h3 class="text-center m-2 mt-3">Pesanan</h3>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Semua</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Belum Dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sedang Diproses</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Sedang Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sudah Terkirim</a>
                  </li>
              </ul>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-8">
                @php
                    $i = 0;
                @endphp
                
                @foreach ($orders as $order)
                @php
                    ++$i;
                @endphp
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="card-title col-8">Pesanan {{ $order->created_at }}</h5>
                            <h5 class="card-title col-4 text-end">{{ 'Rp. '.$order->total }}</h5>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="d-flex flex-row ">
                                        <button class="btn btn-outline-dark mr-2" type="button" data-bs-toggle="collapse" data-bs-target="{{ '#orderItem'.$i }}">
                                            Detail
                                        </button>
                                        @if ($order->status == 0)
                                        <form action="/checkout" method="post">
                                            @csrf
                                            <input type="hidden" name="id_order" value="{{ $order->id }}">
                                            <input type="hidden" name="total" value="{{ $order->total }}">
                                            <button class="btn btn-outline-success" type="submit">Bayar</button>
                                        </form>
                                        @endif
                                </div>
                                
                            </div>
                            <div class="col-2">
                                
                            </div>
                            
                            <div class="col-6 text-end fw-bold">
                                @switch($order->status)
                                    @case(0)
                                        {{ "Belum Dibayar" }}
                                        @break
                                    @case(1)
                                        {{ "Sedang Diproses" }}
                                        @break
                                    @case(2)
                                        {{ "Sedang Dikirim" }}
                                        @break
                                    @case(3)
                                        {{ "Sudah Terkirim" }}
                                        @break
                                    @default
                                @endswitch
                            </div>
                        </div>
                        <div class="collapse" id="{{ 'orderItem'.$i }}">
                            <div class="card card-body">
                                <div class="row fw-bold">
                                    <div class="col-6">Produk</div>
                                    <div class="col-2">Jumlah</div>
                                    <div class="col-2">Subtotal</div>
                                </div>
                                @foreach ($order->orderitem as $item)
                                    <div class="row">
                                        <div class="col-6">{{ $item->product->product_name }}</div>
                                        <div class="col-2">{{ $item->quantity }}</div>
                                        <div class="col-4">{{ 'Rp. '.$item->price }}</div>
                                    </div>    
                                @endforeach
                                <hr>
                                <div class="row fw-bold">
                                    <div class="col-6"></div>
                                    <div class="col-2">Total</div>
                                    <div class="col-4">{{ 'Rp. '.$order->total }}</div>
                                </div>
                                
                            </div>
                        </div>
                    </div> <!-- card-body -->
                </div> <!-- card -->
                @endforeach
            
        </div>
    </div>
    @else
    <div class="row d-flex justify-content-center mt-3 text-center">
                <h2>Belum ada pesanan!</h2>
                <h5>Silahkan pilih barang dari katalog terlebih dahulu <a href="{{ route('catalogue') }}">disini</a></h5>
    </div>
            @endif
</div> 
@endsection