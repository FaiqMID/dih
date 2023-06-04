@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-2">
        <h1 class="text-center">Manajemen Katalog</h1>
    </div>
	<a class="btn btn-primary mt-2 mb-2" href="{{ route('admin.product.create') }}" role="button">Tambah Produk</a>
    {{-- <a class="btn btn-primary mt-2 mb-2" href="{{ route('admin.product.create') }}" role="button">Manajemen Banner</a> --}}
    @if (!empty($products))
<table class="table mt-2">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nama</th>
		<th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Gambar</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
			<td>{{ $product->id }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_description }}</td>
			<td>{{ $product->product_price }}</td>
			<td><img style="width:8rem" src="{{ asset('build/assets/images/items/' . $product->image) }}"></td>
            <td>
				<a class="btn btn-primary mt-2 mb-2" href="/catalogue/edit/{{ $product->id }}" role="button">Edit</a>
				<button class="btn btn-danger text-light mt-2 mb-2" form="delete-form-{{ $product->id }}" type="submit">Hapus</button>
			</td>

            <form id="delete-form-{{ $product->id }}" action="{{ route('admin.product.delete', $product) }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                @method('DELETE')
            </form>
			
        </tr>  
        @endforeach    
    
    </tbody>
  </table> 
    <div class="row mt-3">
        <div class="d-flex justify-content-end"">
            {!! $products->links() !!}
        </div>
    </div>
    @else
        <h2>Tidak ada produk!</h2>
    @endif
</div> 
@endsection