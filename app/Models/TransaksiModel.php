<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TransaksiModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_customer',
        'id',
    ];

    //make relation many to many with table produk
    // public function produk()
    // {
    //     return $this->belongsToMany(ProdukModel::class, 'detail_transaksi', 'id_transaksi', 'id_produk');
    // }   



}
