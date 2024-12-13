public function edit($id)
    {
        $data = Produk::find($id);
        return view('produk.edit', compact('data'));
    }