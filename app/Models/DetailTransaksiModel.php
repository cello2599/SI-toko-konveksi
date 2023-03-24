<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'detail_transaksi';
    //get foreign key
    protected $foreignKey = 'id_transaksi';
    protected $foreignKey = 'id_produk';
}
