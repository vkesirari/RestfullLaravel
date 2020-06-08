<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customer.index',compact('customers'));
    }
    public function create(){
        $customer = new Customer();
        return view('customer.create',compact('customer'));
    }
    public function store(){
        // $data = request()->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        // ]);
        // Customer::create($data);
        // $customer->create($data);
        // $customer->create($this->validateData());
        $customer =  Customer::create($this->validateData());
        return redirect('/customers/'.$customer->id);
        // return view('customer.store');
    }
    public function show(Customer $customer){
        //without using $customer = Customer::find($customer); you can do this model routing 
        return view('customer.show',compact('customer'));
    } 
    public function edit(Customer $customer){
        return view('customer.edit',compact('customer'));
    } 
    public function update(Customer $customer){
       $customer->update($this->validateData());
        return redirect('/customers');
        //return view('customer.edit',compact('customer'));
    } 
    public function destory(Customer $customer){
        $customer->delete();
        return redirect('/customers');

    }
    protected function validateData(){
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

    }
}
