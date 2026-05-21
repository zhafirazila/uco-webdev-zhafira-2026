{{--
    View: products.form
    Digunakan untuk form tambah produk baru (mode: create)
    dan form edit produk yang sudah ada (mode: edit).

    Variabel:
    - $mode (string): 'create' atau 'edit'
    - $product (array, opsional): data produk yang diedit, hanya ada saat mode 'edit'
--}}

{{-- Judul halaman menyesuaikan mode menggunakan binding atribut Blade component --}}
<x-template :title="$mode === 'edit' ? 'Edit Produk' : 'Tambah Produk'">

    <h2>{{ $mode === 'edit' ? 'Edit Produk' : 'Tambah Produk' }}</h2>

    {{--
        Action form menyesuaikan mode:
        - create: mengarah ke route products.store (POST)
        - edit: mengarah ke route products.update dengan parameter id (POST)
        Kelas was-validated mengaktifkan validasi visual Bootstrap
    --}}
    <form method="post"
          action="{{ $mode === 'edit' ? route('products.update', ['id' => $product['id']]) : route('products.store') }}"
          class="was-validated mt-3">

        {{-- Token CSRF wajib ada di setiap form POST di Laravel --}}
        @csrf

        {{-- Input nama produk --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ isset($product) ? $product['name'] : '' }}" required>
        </div>

        {{-- Textarea deskripsi produk --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control"
                      required>{{ isset($product) ? $product['description'] : '' }}</textarea>
        </div>

        {{-- Input harga produk (tipe number) --}}
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" id="price" class="form-control"
                   value="{{ isset($product) ? $product['price'] : '' }}" required>
        </div>

        {{-- Tombol submit dan batal --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            {{-- Tombol batal kembali ke halaman daftar produk --}}
            <a href="{{ route('products') }}" class="btn btn-secondary">Batal</a>
        </div>

    </form>

</x-template>
