<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $customers = Customer::with('company')->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer;

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store(Request $request)
    {
        $customer = Customer::create($this->validateRequest($request));

        $this->storeImage($request, $customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($this->validateRequest($request));

        $this->storeImage($request, $customer);

        return redirect()->route('customers.show', $customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index');
    }

    private function validateRequest($request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'image|max:5000'
        ]);
    }

    public function storeImage($request, $customer)
    {
        if ($request->has('image')) {
            $customer->update([
                'image' => $request->image->store('uploads', 'public'),
            ]);
        }

        $image = Image::make(public_path('storage/' . $customer->image))->resize(300, 300);
        $image->save();
    }
}
