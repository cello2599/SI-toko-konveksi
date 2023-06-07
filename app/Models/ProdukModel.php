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
    //get data from table
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'gambar',
        'harga',
        'id_kategori',
        'id_ukuran',
    ];

    //relation many to many with table transaksi
    public function transaksi()
    {
        return $this->belongsToMany(TransaksiModel::class, 'detail_transaksi', 'id_produk', 'id_transaksi');
    }

    
}
