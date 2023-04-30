<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisModel;

class JenisController extends Controller
{   
    //get data from jenis model
    function index()
    {
        $data = JenisModel::all();
        //return data to json
        return response()->json($data);
    }
}
