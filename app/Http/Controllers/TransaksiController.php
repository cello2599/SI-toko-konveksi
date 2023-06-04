<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Http\Resources\TransaksiResource;
// use App\Models\ProdukModel;


class TransaksiController extends Controller
{
    //create data transaksi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_customer' => 'required',
        ]);

        $request['id'] = auth()->user()->id;

        $transaksi = TransaksiModel::create($request->all());
        $transaksi = TransaksiModel::join('users', 'transaksi.id', '=', 'users.id')
            ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
            ->select('transaksi.*', 'users.name', 'customer.nama' , 'customer.alamat', 'customer.no_telp')
            //get id transaksi
            ->where('id_transaksi', $transaksi->id_transaksi)
            ->first();

        // foreach($produk as $key => $value){
        //     $transaksi->produk()->attach($value, [
        //         'jumlah' => $request->input('jumlah')[$key],
        //     ]);
        // }
        return new TransaksiResource($transaksi);
    }
}
