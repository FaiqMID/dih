@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Checkout -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Checkout</a></li>
        </ol>
    </nav>

    <!-- Product Detail -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 d-grid">
                <h3 class="fw-bold">Metode Pembayaran</h3>
                <div class="btn-group-vertical mt-3" role="group" aria-label="Vertical radio toggle button group">
                    <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio1" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="vbtn-radio1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                            <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z"/>
                        </svg>
                        Paypal
                    </label>
                    <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio2" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="vbtn-radio2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                            <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z"/>
                        </svg>
                        Kartu Debit / Kredit
                    </label>
                    <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="vbtn-radio3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                        </svg>
                        Go-Pay
                    </label>
                    <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio4" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="vbtn-radio4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                        </svg>
                        Cash
                    </label>
                  </div>
            </div>
            <div class="col-2 align-self-center">
            </div>
            <div class="col-4">
                <div class="card" style="width: 21rem;">
                    <div class="card-body">
                        <p class="font-weight-bold">Total yang harus dibayar</p>
                        <p class="font-weight-bold" style="color:#22577A">Rp. {{ $info_pembayaran['total']}}</p>
                        <a data-toggle="modal" data-target="#bayar">
                            <button class="btn btn-success w-100" type="button">
                                Bayar
                            </button>    
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up Bayar -->
    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container mt-3 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <main class="form-signin">
                                    <h1 class="h3 mb-3 fw-normal text-center">Bayar?</h1>
                                    <form action="/pay" method="post">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{ $info_pembayaran['id_order'] }}">
                                        <button class="w-100 btn btn-success mt-3" type="submit">Proses</button>
                                    </form>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection