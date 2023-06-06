<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\DropdownCustomer;


class CustomerController extends Controller
{
    //how to creeate customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $customer = CustomerModel::create($request->all());
        return new CustomerResource($customer);
    }

    //how to get data from database
    public function index()
    {
        $customer = CustomerModel::all();
        return CustomerResource::collection($customer);
    }

    //how to get data by id from database
    public function detail($id)
    {
        $customer = CustomerModel::findOrFail($id);
        return new CustomerResource($customer);
    }

    //how to update data from database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        $customer = CustomerModel::findOrFail($id);
        $customer->update($request->all());
        return new CustomerResource($customer);
    }

    //how to delete data from database
    public function destroy($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->delete();
        return new CustomerResource($customer);
    }

    public function dropdown(){

        $customer = CustomerModel::all();

        return DropdownCustomer::collection($customer);
    }


}
