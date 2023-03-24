<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
}
