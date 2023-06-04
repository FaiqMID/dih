@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="name" placeholder="Nama produk" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rupiah)</label>
            <input type="number" class="form-control" id="nama" name="price" placeholder="0" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
    </form>
</div>
@endsection