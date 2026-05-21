{{--
    View: products.show
    Menampilkan detail lengkap satu produk berdasarkan id.
    Data produk dikirim dari ProductController@show.

    Variabel:
    - $product (array): data produk yang akan ditampilkan
--}}
<x-template title="Detail Produk">

    <h2>Detail Produk</h2>

    {{-- Card Bootstrap untuk menampilkan detail produk --}}
    <div class="card mt-3">
        <div class="card-body">
            {{-- Nama produk --}}
            <h5 class="card-title">{{ $product['name'] }}</h5>

            {{-- Deskripsi produk --}}
            <p class="card-text">{{ $product['description'] }}</p>

            {{-- Harga produk dengan format Rupiah --}}
            <p class="card-text">
                <strong>Harga:</strong> Rp {{ number_format($product['price'], 0, ',', '.') }}
            </p>

            {{-- Tombol Edit mengarah ke route products.edit --}}
            <a href="{{ route('products.edit', ['id' => $product['id']]) }}"
               class="btn btn-warning">Edit</a>

            {{-- Tombol Kembali mengarah ke halaman daftar produk --}}
            <a href="{{ route('products') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</x-template>
