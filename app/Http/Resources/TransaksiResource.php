<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TransaksiModel;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        //get jumlah total transaksi
        $totalTransaksi = $this->whenLoaded('produks', function () {
            return collect($this->produks)->sum(function ($product) {
                return $product->jumlah * $product->produk->harga;
            });
        });

        return [
        'id_transaksi' => $this->id_transaksi,
        'nama_customer' => $this->nama,
        'alamat_customer' => $this->alamat,
        'no_telp' => $this->no_telp,
        'admin' => $this->name,
        'tanggal' => date_format($this->created_at, 'd-m-Y H:i:s'),
        'produks' => $this->whenLoaded('produks', function () {
            return $this->produks->map(function ($product) {
                // $product->produk;
                return [
                    'id_produk' => $product->produk->id_produk,
                    'nama_produk' => $product->produk->nama_produk,
                    'harga' => $product->produk->harga,
                    'jumlah' => $product->jumlah,
                    'totalHarga' => $product->jumlah * $product->produk->harga
                ];
            });
        }),
        'totalTransaksi' => $totalTransaksi
        ];
    }
}
