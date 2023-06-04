@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="name" placeholder="Nama produk" value="{{ old('name', $data->product_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="description" rows="3" required>{{ old('description', $data->product_description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rupiah)</label>
            <input type="number" class="form-control" id="nama" name="price" placeholder="0" value="{{ old('price', $data->product_price) }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="image" name="image" value="{{ old('image', $data->image) }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
    </form>
</div>
@endsection