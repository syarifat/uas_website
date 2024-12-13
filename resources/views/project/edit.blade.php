<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    @method('PUT') {{-- Metode HTTP PUT untuk update --}}
    
    <div>
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" value="{{ $produk->nama }}" required>
    </div>
    
    <div>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="{{ $produk->harga }}" required>
    </div>
    
    <div>
        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" value="{{ $produk->stok }}" required>
    </div>
    
    <button type="submit">Simpan Perubahan</button>
</form>
