<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Http\Resources\TransaksiResource;
use App\Http\Resources\GrafikResource;
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

    //get all data transaksi
    public function index()
    {
        $transaksi = TransaksiModel::join('users', 'transaksi.id', '=', 'users.id')
            ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
            ->select('transaksi.*', 'users.name', 'customer.nama' , 'customer.alamat', 'customer.no_telp')
            ->get();

        // $transaksi = TransaksiModel::all();
        return TransaksiResource::collection($transaksi->loadMissing(['produks']));
    }

    public function grafik()
    {
        $transaksi = TransaksiModel::join('users', 'transaksi.id', '=', 'users.id')
            ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
            ->select('transaksi.*', 'users.name', 'customer.nama' , 'customer.alamat', 'customer.no_telp')
            ->get();

        // $transaksi = TransaksiModel::all();
        return GrafikResource::collection($transaksi->loadMissing(['produks']));
    }

    //get data transaksi by id
    public function detail($id_transaksi)
    {
        $transaksi = TransaksiModel::join('users', 'transaksi.id', '=', 'users.id')
            ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
            ->select('transaksi.*', 'users.name', 'customer.nama' , 'customer.alamat', 'customer.no_telp')
            ->where('id_transaksi', $id_transaksi)
            ->first();

        return new TransaksiResource($transaksi->loadMissing(['produks']));
    }

    //delete transaksi by id
    public function delete($id_transaksi)
    {
        $transaksi = TransaksiModel::where('id_transaksi', $id_transaksi)->first();
        if ($transaksi) {
            $transaksi->delete();
            return response()->json([
                'message' => 'Success',
                'data' => $transaksi
            ]);
        }
        return response()->json([
            'message' => 'Transaksi not found'
        ], 404);
    }
}
