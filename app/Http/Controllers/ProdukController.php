<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProdukModel;
use App\Http\Resources\ProdukResource;
use App\Http\Resources\DetailProdukResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\DropdownProduk;

class ProdukController extends Controller
{
    //how to get data from database
    public function index()
    {
        $produk = ProdukModel::all();
        $produk = ProdukModel::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('ukuran', 'produk.id_ukuran', '=', 'ukuran.id_ukuran')
            ->select('produk.*', 'kategori.kategori_produk', 'ukuran.ukuran')
            ->get();
        //return data to json and 
        //return response()->json($data);
        //return data from resources
        return ProdukResource::collection($produk);
    }

    //how to get data by id from database
    public function detail($id)
    {
        $produk = ProdukModel::findOrFail($id);
        
        return new DetailProdukResource($produk);
    }

    public function dropdown()
    {
        $produk = ProdukModel::all();
        $produk = ProdukModel::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('ukuran', 'produk.id_ukuran', '=', 'ukuran.id_ukuran')
            ->select('produk.*', 'kategori.kategori_produk', 'ukuran.ukuran')
            ->get();
        //return data to json and 
        //return response()->json($data);
        //return data from resources
        return DropdownProduk::collection($produk); 
    }

    //how to insert data to database
    public function store(Request $request)
    {   
    
        $validated = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'id_ukuran' => 'required',
            'id_kategori' => 'required',
        ]);

        if($request->file){
            $extension = $request->file->extension();
            $filename = time() . '.' . $extension;

            Storage::putfileAs('public/images', $request->file, $filename);
        }
        else{
            $filename = '';
        }

        $request['gambar']= $filename;
        $produk = ProdukModel::create($request->all());
        $produk = ProdukModel::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('ukuran', 'produk.id_ukuran', '=', 'ukuran.id_ukuran')
            ->select('produk.*', 'kategori.kategori_produk', 'ukuran.ukuran')
            ->where('produk.id_produk', '=', $produk->id_produk)
            ->first();
        return new ProdukResource($produk);
    }

    //update data nama,harga dan file gambar
    public function update(Request $request, $id){

        $validated = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'id_ukuran' => 'required',
            'id_kategori' => 'required',
        ]); 


        if($request->file == null){
            // //delete gambar lama
            $produk = ProdukModel::findOrFail($id);
            $filename = $produk->gambar;

        }
        else{
            $produk = ProdukModel::findOrFail($id);
            $filename = $produk->gambar;

            Storage::delete('public/images/'.$filename);

            $extension = $request->file->extension();
            $filename = time() . '.' . $extension;

            Storage::putfileAs('public/images', $request->file, $filename);
            
        }

        $request['gambar']= $filename;
        $produk = ProdukModel::findOrFail($request->id);
        $produk->update($request->all());
        $produk = ProdukModel::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('ukuran', 'produk.id_ukuran', '=', 'ukuran.id_ukuran')
            ->select('produk.*', 'kategori.kategori_produk', 'ukuran.ukuran')
            ->where('produk.id_produk', '=', $produk->id_produk)
            ->first();

        return new ProdukResource($produk);
    }

    //menghapus data dari database
    public function destroy($id)
    {
        $produk = ProdukModel::findOrFail($id);

        //delete gambar di storage
        $filename = $produk->gambar;
        Storage::delete('public/images/'.$filename);
        $produk->delete();

        return new ProdukResource($produk);
    }
}
