<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //Metodos de vistas
    public function index(){
        $customers = $this->read();
        return view('customer.index', compact('customers'));
    }
    public function register(){
        return view('customer.register');
    }

    public function edit($id){
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function show($id){
        $customer=Customer::find($id);
        return view('customer.show', compact('customer'));
    }

    //Metodos de crud http
    public function create(Request $request)
    {
        $datos = $this->validateForm($request);
        Customer::insert($datos);
        return redirect(route('customerIndex'));
    }

    public function read(){
        return Customer::all();
    }

    public function update($id, Request $request){
        $data = $this->validateForm($request);
        Customer::find($id)->update($data);
        return redirect(route('customerIndex'));
    }

    public function delete($id){
        Customer::find($id)->delete();
        return redirect(route('customerIndex'));
    }

    //Metodo aux para validar datos
    public function validateForm (Request $request){
        $validatedData = $request->validate([
            'name'=>'required|max:75',
            'address'=>'required|max:250',
            'phone_number'=>'required|max:25',
        ]);
        return $validatedData;
    }
}
