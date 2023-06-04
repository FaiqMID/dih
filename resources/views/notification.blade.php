@extends('layouts.app')

@section('content')

<!-- Breadcrumb Order -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Notifikasi</a></li>
    </ol>
</nav>

<div class="container">
    @if (!empty($notifications))
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-8">
                <div class="row mb-2">
                    <div class="col-6">
                        <h3>Notifikasi Pesanan</h3>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <form method="POST" action="{{ route('notif.markAllAsRead') }}">
                            @csrf
                            <button class="btn btn-outline-secondary" type="submit">
                                Tandai semua sudah dibaca
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                    </svg>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>

                    @foreach ($notifications as $notification)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-8 {{ (!$notification->is_read) ? '' : 'text-secondary' }}">{{ $notification->message }}</h5>
                                <div class="col-4 d-flex justify-content-end">
                                    @if(!$notification->is_read)
                                            <form method="POST" action="{{ route('notif.markAsRead') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $notification->id }}">
                                                <button class="btn btn-outline-secondary " style="height:100%" type="submit">
                                                    Tandai udah dibaca
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                        </svg>
                                                    </span>
                                                </button>
                                            </form>
                                    @else
                                    <button class="btn btn-outline-secondary" style="height:100%" disabled aria-disabled="true">
                                        Sudah dibaca
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                            </svg>
                                        </span>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                    @endforeach
            </div>
        </div>
    @else
        <div class="row d-flex justify-content-center mt-3 text-center">
                    <h2>Belum ada notifikasi!</h2>
        </div>
    @endif
</div> 
@endsection