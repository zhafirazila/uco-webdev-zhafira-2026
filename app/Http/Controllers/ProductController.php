<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ProductController
 *
 * Controller untuk mengelola halaman-halaman yang berkaitan dengan produk,
 * mencakup daftar produk, detail, form tambah, dan form edit.
 */
class ProductController extends Controller
{
    /**
     * Menyediakan data dummy 20 produk sebagai pengganti database.
     * Data bersifat tetap (tidak random) agar konsisten di semua halaman.
     *
     * @return array
     */
    function dummyProducts(): array
    {
        return [
            ['id' => 1,  'name' => 'Laptop Asus',        'description' => 'High performance gaming laptop',        'price' => 12000000],
            ['id' => 2,  'name' => 'Mouse Logitech',      'description' => 'Ergonomic wireless mouse',              'price' => 350000],
            ['id' => 3,  'name' => 'Keyboard Mechanical', 'description' => 'RGB mechanical keyboard',               'price' => 850000],
            ['id' => 4,  'name' => 'Monitor LG',          'description' => 'IPS 24 inch Full HD monitor',           'price' => 2800000],
            ['id' => 5,  'name' => 'Headset Sony',        'description' => 'Noise cancelling headset',              'price' => 1500000],
            ['id' => 6,  'name' => 'Webcam Logitech',     'description' => 'HD 1080p webcam',                       'price' => 750000],
            ['id' => 7,  'name' => 'SSD Samsung',         'description' => 'High speed 1TB NVMe SSD',               'price' => 1200000],
            ['id' => 8,  'name' => 'RAM Corsair',         'description' => 'DDR4 16GB 3200MHz RAM',                 'price' => 900000],
            ['id' => 9,  'name' => 'GPU RTX 4060',        'description' => 'Latest gaming graphics card',           'price' => 6500000],
            ['id' => 10, 'name' => 'CPU Intel i5',        'description' => '13th generation processor',             'price' => 3200000],
            ['id' => 11, 'name' => 'Printer Canon',       'description' => 'Multifunction inkjet printer',          'price' => 1100000],
            ['id' => 12, 'name' => 'Scanner Epson',       'description' => 'A4 document scanner',                   'price' => 950000],
            ['id' => 13, 'name' => 'Speaker JBL',         'description' => 'Portable bluetooth speaker',            'price' => 600000],
            ['id' => 14, 'name' => 'Microphone Blue',     'description' => 'USB condenser microphone',              'price' => 1350000],
            ['id' => 15, 'name' => 'Charger Anker',       'description' => 'Multi port 65W GaN charger',            'price' => 450000],
            ['id' => 16, 'name' => 'Hub USB-C',           'description' => '7 in 1 USB-C hub',                      'price' => 380000],
            ['id' => 17, 'name' => 'Mousepad XL',         'description' => 'XL size gaming mousepad',               'price' => 150000],
            ['id' => 18, 'name' => 'Laptop Stand',        'description' => 'Adjustable aluminium laptop stand',     'price' => 280000],
            ['id' => 19, 'name' => 'Kabel HDMI',          'description' => 'HDMI 2.1 4K 60Hz 2 meter cable',        'price' => 120000],
            ['id' => 20, 'name' => 'Flash Drive Sandisk', 'description' => 'USB 3.0 64GB flash drive',              'price' => 95000],
        ];
    }

    /**
     * Menampilkan halaman daftar semua produk.
     * Data produk diambil dari dummyProducts() dan dikirim ke view products.list.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $products = $this->dummyProducts();
        return view('products.list', compact('products'));
    }

    /**
     * Menampilkan halaman form untuk menambah produk baru.
     * Mode 'create' dikirim ke view untuk membedakan form tambah dan edit.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    function create(Request $request)
    {
        return view('products.form', ['mode' => 'create']);
    }

    /**
     * Menyimpan data produk baru yang dikirim dari form ke dalam session.
     * Setelah disimpan, user diarahkan kembali ke halaman daftar produk.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Request $request)
    {
        // Simpan data produk baru ke session sebagai pengganti database
        $request->session()->push('products', [
            'id'          => rand(100, 999),
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
        ]);

        // Redirect ke halaman daftar produk setelah berhasil disimpan
        return redirect()->route('products');
    }

    /**
     * Menampilkan halaman form edit untuk produk berdasarkan id.
     * Data produk yang sesuai dicari dari dummyProducts() lalu dikirim ke view.
     *
     * @param Request $request
     * @param int $id ID produk yang akan diedit
     * @return \Illuminate\View\View
     */
    function edit(Request $request, $id)
    {
        // Ambil semua produk lalu cari produk dengan id yang sesuai
        $products = $this->dummyProducts();
        $product  = collect($products)->firstWhere('id', (int) $id);

        // Kirim mode 'edit' dan data produk ke view form
        return view('products.form', ['mode' => 'edit', 'product' => $product]);
    }

    /**
     * Memproses perubahan data produk berdasarkan id.
     * Karena belum menggunakan database, langsung redirect ke daftar produk.
     *
     * @param Request $request
     * @param int $id ID produk yang akan diupdate
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request, $id)
    {
        // Redirect ke halaman daftar produk setelah update
        return redirect()->route('products');
    }

    /**
     * Menampilkan halaman detail produk berdasarkan id.
     * Data produk yang sesuai dicari dari dummyProducts() lalu dikirim ke view.
     *
     * @param Request $request
     * @param int $id ID produk yang akan ditampilkan
     * @return \Illuminate\View\View
     */
    function show(Request $request, $id)
    {
        // Ambil semua produk lalu cari produk dengan id yang sesuai
        $products = $this->dummyProducts();
        $product  = collect($products)->firstWhere('id', (int) $id);

        return view('products.show', compact('product'));
    }
}
