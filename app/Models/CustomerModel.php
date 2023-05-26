<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerModel extends Model
{
    use HasFactory, SoftDeletes;
    //get data from table
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'email',
    ];
}
