{{--
    View: products.list
    Menampilkan daftar semua produk dalam format card Bootstrap.
    Data produk dikirim dari ProductController@index.

    Variabel:
    - $products (array): daftar produk yang akan ditampilkan
--}}
<x-template title="Product List">

    {{-- Header halaman dan tombol tambah produk --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Product List</h2>
        {{-- Tombol Add new product mengarah ke route products.create --}}
        <a class="btn btn-primary" href="{{ route('products.create') }}">Add new product</a>
    </div>

    {{-- Loop semua produk menggunakan Blade directive @foreach --}}
    @foreach ($products as $product)
        {{-- Card Bootstrap untuk setiap produk --}}
        <div class="card mt-3">
            <div class="card-body">
                {{-- Nama produk --}}
                <h5 class="card-title">{{ $product['name'] }}</h5>

                {{-- Deskripsi produk --}}
                <p class="card-text">{{ $product['description'] }}</p>

                {{-- Harga produk dengan format Rupiah --}}
                <p class="card-text">
                    <strong>Price:</strong> Rp {{ number_format($product['price'], 0, ',', '.') }}
                </p>

                {{-- Tombol Detail mengarah ke route products.show --}}
                <a href="{{ route('products.show', ['id' => $product['id']]) }}"
                   class="btn btn-sm btn-info">Detail</a>

                {{-- Tombol Edit mengarah ke route products.edit --}}
                <a href="{{ route('products.edit', ['id' => $product['id']]) }}"
                   class="btn btn-sm btn-warning">Edit</a>
            </div>
        </div>
    @endforeach

</x-template>
