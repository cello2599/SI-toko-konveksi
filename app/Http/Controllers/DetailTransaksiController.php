<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;

class DetailTransaksiController extends Controller
{
    //create data detail transaksi
    public function store(Request $request,$id_transaksi)
    {
        $validated = $request->validate([
            'id_produk' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        
        $id_produk = $request->input('id_produk');
        $jumlah = $request->input('jumlah');

        //check if id_produk just one
        // if(is_array($id_produk)){
        //     $id_produk = $id_produk[0];
        //     $jumlah = $jumlah[0];
        // }

        //create detail transaksi
        foreach ($id_produk as $index => $id_produk_item) {
            // $id_transaksi_item = $id_transaksi[$index];
            $jumlah_item = $jumlah[$index];

            // Create detail transaksi for each item
            $detail_transaksi = DetailTransaksiModel::create([
                'id_transaksi' => $id_transaksi,
                'id_produk' => $id_produk_item,
                'jumlah' => $jumlah_item,
            ]);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $detail_transaksi
        ]);
    }

    //get all data detail transaksi
    public function index()
    {
        $detail_transaksi = DetailTransaksiModel::join('transaksi', 'detail_transaksi.id_transaksi', '=', 'transaksi.id_transaksi')
            ->join('produk', 'detail_transaksi.id_produk', '=', 'produk.id_produk')
            ->select('detail_transaksi.*', 'transaksi.id_transaksi', 'produk.nama_produk', 'produk.harga')
            ->get();
        return response()->json($detail_transaksi);
    }
}
