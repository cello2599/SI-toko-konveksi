<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UkuranModel;

class UkuranController extends Controller
{   
    //get data from jenis model
    function index()
    {
        $data = UkuranModel::all();
        //return data to json
        return response()->json($data);
    }
}
