<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Http\Resources\TransaksiResource;
use App\Models\ProdukModel;


class TransaksiController extends Controller
{
    //create transaksi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_customer' => 'required',
            'id' => 'required',
            'jumlah_transaksi' => 'required',
            'total_transaksi' => 'required',
        ]);

        $transaksi = TransaksiModel::create($request->all());

        //get data from table produk
        $produkId = $request->input('id_produk');
        $produk = ProdukModel::findOrFail($produkId);

        $transaksi->produk()->attach($produkId, ['harga' => $produk->harga]);
        
        return response()->json([
            'message' => 'Success',
            'data' => $transaksi
        ]);
    }
}
