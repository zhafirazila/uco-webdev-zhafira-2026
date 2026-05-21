{{--
    Blade Component: template
    Komponen layout utama yang digunakan di semua halaman.
    Menyediakan struktur HTML, Bootstrap CDN, dan navbar.

    Atribut:
    - $title (opsional): judul halaman yang ditampilkan di tab browser
    - $slot: konten utama halaman yang disisipkan di dalam container
--}}
<!DOCTYPE html>
<html>
<head>
    {{-- Judul halaman: nama app + judul spesifik jika ada --}}
    <title>WebDev @isset($title) - {{ $title }} @endisset</title>

    {{-- Bootstrap CSS via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous">

    {{-- Bootstrap JS Bundle (termasuk Popper) via CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
</head>
<body>

{{-- Navbar utama aplikasi --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">WebDev</a>

        {{-- Tombol toggle untuk tampilan mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Daftar link navigasi --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= route('home') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= route('article.list') ?>">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= route('products') ?>">Products</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Konten utama halaman disisipkan di sini melalui $slot --}}
<div class="container">
    {{ $slot }}
</div>

</body>
</html>
