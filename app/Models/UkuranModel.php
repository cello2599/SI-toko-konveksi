<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UkuranModel extends Model
{
    use HasFactory;
    //get data from table
    protected $table = 'ukuran'; 
    protected $primaryKey = 'id_ukuran';
}
