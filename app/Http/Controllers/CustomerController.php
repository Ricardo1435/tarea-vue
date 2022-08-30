<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        $data = $this->validateRequest($request);
        $newCustomer = Customer::insert($data);
        return $newCustomer;
    }
    public function read()
    {
        return Customer::all();
    }
    public function readOne($id)
    {
        return Customer::find($id);
    }
    public function edit(Request $request, $id)
    {
        $data = $this->validateRequest($request);
        $editedCustomer = Customer::find($id)->update($data);
        return $editedCustomer;
    }
    public function delete($id)
    {
        $deletedCustomer =  Customer::find($id)->delete();
        return $deletedCustomer;
    }

    public function validateRequest (Request $request){
        $validated = $request->validate([
            'name'=>'required|max:75',
            'address'=>'required|max:250',
            'phone_number'=>'required|max:25',
        ]);
        return $validated;
    }
}
