<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    //how to get data from database
    public function index()
    {
        $data = ['produk'] => ProdukModel::all();
        return view('produk.index', $data);
    }

    //how to insert data to database
    public function insert(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_kategori' => 'required',
            'id_jenis' => 'required',
        ]);

        \App\Models\ProdukModel::create($request->all());
        return redirect('produk')->with('status', 'Data Berhasil Ditambahkan!');
    }
}
