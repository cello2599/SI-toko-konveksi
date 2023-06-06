<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksiModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'detail_transaksi';
    //get foreign key
    // protected $foreignKey = ['id_transaksi', 'id_produk'];

    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'jumlah',
    ];

    //make relation with table produk
    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id_produk');
    }

    //make relation with table transaksi
    // public function transaksi()
    // {
    //     return $this->belongsTo(TransaksiModel::class, 'id_transaksi', 'id_transaksi');
    // }

    //make relation because this table pivot
    public function transaksi()
    {
        return $this->belongsToMany(TransaksiModel::class, 'detail_transaksi', 'id_transaksi', 'id_produk');
    }
}
