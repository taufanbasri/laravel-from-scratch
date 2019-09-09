<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $customers = Customer::all();

        return view('internals.customers', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Customer::create($request->all());

        return back();
    }
}
