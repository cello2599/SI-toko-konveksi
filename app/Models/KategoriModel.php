<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
}
