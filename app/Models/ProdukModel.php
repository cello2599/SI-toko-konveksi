<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'produk';
    //protected $primaryKey = 'id_produk';
}
