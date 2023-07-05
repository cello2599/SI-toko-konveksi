<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ProdukModel;

class DetailProdukResource extends JsonResource 
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_produk' => $this->id_produk,
            'nama_produk' => $this->nama_produk,
            'gambar' => $this->gambar,
            'harga' => $this->harga,
            'id_kategori' => $this->id_kategori,
            'id_ukuran' => $this->id_ukuran
            ];
    }
}
