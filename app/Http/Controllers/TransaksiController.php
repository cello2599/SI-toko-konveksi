<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;


class TransaksiController extends Controller
{
    //create data transaksi
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'id_customer' => 'required',
        //     'id' => 'required',
        // ]);

        // $transaksi = TransaksiModel::create($request->all());
        // return response()->json([
        //     'message' => 'Success',
        //     'data' => $transaksi
        // ]);

        $transaksi = TransaksiModel::create([
            'id_customer' => $request->id_customer,
            'id' => $request->id,
        ]);

        // $produk = $request->input('nama_produk');
        // //get harga produk
        // //$harga = $produk->harga;


        // foreach($produk as $key => $value){
        //     $transaksi->produk()->attach($value, [
        //         'jumlah' => $request->input('jumlah')[$key],
        //     ]);
        // }

        return response()->json([
            'message' => 'Success'
        ]);
        //get harga produk
        // $harga = $produk->harga;
        //get jumlah from detail transaksi
        // $jumlah = $request->jumlah;
    }
}
