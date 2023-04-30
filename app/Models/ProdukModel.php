<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukModel extends Model
{
    use HasFactory, SoftDeletes;
    //get data from table
    //get data from table
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'harga',
        'ukuran',
        'id_kategori',
        'id_jenis',
    ];

    
}
