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
        return [
        'id_transaksi' => $this->id_transaksi,
        'nama_customer' => $this->nama,
        'alamat_customer' => $this->alamat,
        'no_telp' => $this->no_telp,
        'admin' => $this->name
        ];
    }
}
