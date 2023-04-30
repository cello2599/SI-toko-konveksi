<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    //get data from kategori model
    function index()
    {
        $data = KategoriModel::all();
        //return data to json
        return response()->json($data);
    }
    
}
