<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CustomerModel;

class DropdownCustomer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_customer' => $this->id_customer,
            'nama' => $this->nama,
            'no_telp' => $this->no_telp,
            ];
    }
}
