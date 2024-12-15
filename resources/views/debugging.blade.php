@extends('layouts.master')
@section('content')
<div class="row mt-4">
    <!-- Kolom Kiri: Pencarian dan Pemilihan Barang -->
    <div class="col-md-6">
        <h3>Cari Barang</h3>
        <div class="input-group mb-3">
            <input type="text" id="search-barang" class="form-control" placeholder="Masukkan Nama Barang...">
            <button id="btn-search" class="btn btn-primary" type="button">Cari</button>
        </div>
        <br>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="search-results">
                <tr>
                    <td colspan="3">Belum ada data.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Kolom Kanan: Keranjang Belanja -->
    <div class="col-md-6">
        <h3>Keranjang</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <tr>
                    <td colspan="2">Keranjang kosong.</td>
                </tr>
            </tbody>
        </table>
        <button id="btn-checkout" class="btn btn-success mt-3 w-100">Beli</button>
    </div>
</div>

<script>
    let cart = []; // Array untuk menyimpan data keranjang

    // Event listener untuk tombol Search
    document.getElementById('btn-search').addEventListener('click', function() {
        const query = document.getElementById('search-barang').value;

        if (!query) {
            alert('Masukkan nama barang yang ingin dicari!');
            return;
        }

        fetch(`/produk/cari?search=${query}`)
            .then(response => response.json())
            .then(results => {
                let html = '';

                if (results.length > 0) {
                    results.forEach(item => {
                        html += `
                            <tr>
                                <td>${item.nama_produk}</td>
                                <td>${item.stok}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="addToCart(${item.id}, '${item.nama_produk}', ${item.stok})">Pilih</button>
                                </td>
                            </tr>`;
                    });
                } else {
                    html = '<tr><td colspan="3">Tidak ada barang ditemukan.</td></tr>';
                }

                document.getElementById('search-results').innerHTML = html;
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
    });

    // Fungsi untuk menambahkan barang ke keranjang
    function addToCart(id, nama, stok) {
        const existing = cart.find(item => item.id === id);

        if (existing) {
            // Jika barang sudah ada, tambahkan jumlahnya jika stok memungkinkan
            if (existing.jumlah < stok) {
                existing.jumlah += 1;
            } else {
                alert('Stok barang tidak cukup.');
                return;
            }
        } else {
            // Jika barang belum ada di keranjang, tambahkan barang baru
            cart.push({ id, nama, jumlah: 1 });
        }

        updateCartView();
    }

    // Fungsi untuk memperbarui tampilan keranjang
    function updateCartView() {
        let html = '';

        if (cart.length > 0) {
            cart.forEach(item => {
                html += `
                    <tr>
                        <td>${item.nama}</td>
                        <td>${item.jumlah}</td>
                    </tr>`;
            });
        } else {
            html = '<tr><td colspan="2">Keranjang kosong.</td></tr>';
        }

        document.getElementById('cart-items').innerHTML = html;
    }

    // Event listener untuk tombol Checkout
    document.getElementById('btn-checkout').addEventListener('click', function() {
        if (cart.length === 0) {
            alert('Keranjang masih kosong!');
            return;
        }

        // Lakukan submit ke backend (contoh sederhana dengan console.log)
        console.log('Checkout:', cart);

        alert('Berhasil membeli barang!');
        cart = []; // Reset keranjang
        updateCartView();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection
