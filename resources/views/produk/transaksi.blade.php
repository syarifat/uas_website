@extends('layouts.master')
@section('content')
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Cari Barang</h3>
            <div class="input-group mb-3">
                <input type="text" id="search-barang" class="form-control" placeholder="Masukkan Nama Barang...">
                <button id="btn-search" class="btn btn-primary">Cari</button>
            </div>
            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga/pcs</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="search-results">
                    <tr>
                        <td colspan="4">Belum ada data.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Keranjang</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Tanggal dan Jam</th>
                    </tr>
                </thead>
                <tbody id="cartTableBody">
                    <tr>
                        <td colspan="5">Keranjang kosong.</td>
                    </tr>
                </tbody>
            </table>
            <button id="btn-checkout" class="btn btn-success mt-3 w-100" onclick="checkout()">Beli</button>
        </div>
    </div>
    <div class="modal" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Konfirmasi Checkout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin melanjutkan pembelian ini?</p>
                    <p>Total Harga: <span id="totalPriceModal"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="confirmCheckout()">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];
        function updateCartView() {
            const cartTableBody = document.getElementById("cartTableBody");
            cartTableBody.innerHTML = '';

            if (cart.length === 0) {
                cartTableBody.innerHTML = '<tr><td colspan="5">Keranjang kosong.</td></tr>';
            } else {
                let totalBelanja = 0;

                cart.forEach(item => {
                    const totalHarga = item.harga * item.jumlah;
                    totalBelanja += totalHarga;

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.nama}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm btn-minus" data-id="${item.kode}">-</button>
                            <span id="jumlah-${item.kode}">${item.jumlah}</span>
                            <button type="button" class="btn btn-primary btn-sm btn-plus" data-id="${item.kode}">+</button>
                        </td>
                        <td>Rp ${item.harga.toLocaleString()}</td>
                        <td>Rp ${totalHarga.toLocaleString()}</td>
                        <td>${new Date().toLocaleString()}</td>
                    `;
                    cartTableBody.appendChild(row);
                });

            
                const totalRow = document.createElement('tr');
                totalRow.innerHTML = `
                    <td colspan="3"><strong>Total Belanja</strong></td>
                    <td colspan="2"><strong>Rp ${totalBelanja.toLocaleString()}</strong></td>
                `;
                cartTableBody.appendChild(totalRow);
            }
        }

    
        function saveProdukToLocalStorage() {
            const cartData = JSON.stringify(cart);
            localStorage.setItem('cart', cartData);
        }

    
        function updateQuantity(kode, change) {
            const item = cart.find(item => item.kode === parseInt(kode));

            if (item) {
                item.jumlah += change;

                if (item.jumlah < 1) {
                    cart = cart.filter(item => item.kode !== parseInt(kode));
                } else {
                    const jumlahElement = document.getElementById(`jumlah-${kode}`);
                    if (jumlahElement) {
                        jumlahElement.textContent = item.jumlah;
                    }
                }

                updateCartView();
                saveProdukToLocalStorage();
            }
        }

    
        function addToCart(kode, nama, harga, buttonElement) {
            const existing = cart.find(item => item.nama === nama);

            if (existing) {
                existing.jumlah += 1;
            } else {
                cart.push({ kode, nama, harga, jumlah: 1 });
            }

            buttonElement.disabled = true;
            buttonElement.textContent = 'Sudah Dipilih';

            updateCartView();
            saveProdukToLocalStorage();
        }

    
        document.addEventListener('click', function(e) {
            if (e.target && (e.target.classList.contains('btn-minus') || e.target.classList.contains('btn-plus'))) {
                const kode = e.target.getAttribute('data-id');
                const change = e.target.classList.contains('btn-minus') ? -1 : 1;
                updateQuantity(kode, change);
            }
        });

    
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
                            const isSelected = cart.find(cartItem => cartItem.nama === item.nama_produk);
                            html += `
                                <tr>
                                    <td>${item.nama_produk}</td>
                                    <td>${item.stok}</td>
                                    <td>Rp ${item.harga.toLocaleString()}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" 
                                                onclick="addToCart(${item.kode_produk}, '${item.nama_produk}', ${item.harga}, this)"
                                                ${isSelected ? 'disabled' : ''}>
                                            ${isSelected ? 'Sudah Dipilih' : 'Pilih'}
                                        </button>
                                    </td>
                                </tr>`;
                        });
                    } else {
                        html = '<tr><td colspan="4">Tidak ada barang ditemukan.</td></tr>';
                    }

                    document.getElementById('search-results').innerHTML = html;
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
        function checkout() {
            if (cart.length === 0) {
                alert('Keranjang kosong!');
                return;
            }

            // Hitung total harga belanja
            let totalBelanja = cart.reduce((total, item) => total + item.harga * item.jumlah, 0);

            // Update teks di dalam elemen modal
            const totalPriceModal = document.getElementById('totalPriceModal');
            totalPriceModal.textContent = `Rp ${totalBelanja.toLocaleString()}`;

            // Tampilkan modal dengan Bootstrap
            const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'), {
                keyboard: false
            });
            checkoutModal.show();
        }

    
        function confirmCheckout() {
            const cartData = cart.map(item => ({
                kode_produk: item.kode,
                harga: item.harga,
                jumlah: item.jumlah,
                total_harga: item.harga * item.jumlah
            }));

            axios.post('/checkout', { cart: cartData })
                .then(response => {
                    if (response.data.success) {
                        alert('Checkout berhasil!');
                        cart = [];
                        updateCartView();
                        saveProdukToLocalStorage();
                        $('#checkoutModal').modal('hide');
                    } else {
                        alert('Gagal melakukan checkout.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, coba lagi!');
                });
        }

    
        function loadCartFromLocalStorage() {
            const cartData = localStorage.getItem('cart');
            if (cartData) {
                cart = JSON.parse(cartData);
                updateCartView();
            }
        }

    
        // loadCartFromLocalStorage();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
@endsection