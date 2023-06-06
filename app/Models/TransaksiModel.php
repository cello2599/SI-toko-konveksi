<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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


    //make relation to get produk
    public function produks(): HasMany
    {
        return $this->hasMany(DetailTransaksiModel::class, 'id_transaksi', 'id_transaksi');
    }



}
