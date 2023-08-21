<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('tv.customers', ["data" => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::where('id', Auth::guard('customer')->id())->first();
        return view('customer.settings', ["data" => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "email" => ["required", "email", new \App\Rules\UniqueEmailAcrossTables],
                "names" => "required",
                "address" => "required",
                "password" => "required",
                "confirmPassword" => "required",
                "phone" => "required|numeric|regex:/^07\d{8}$/"
            ],
            $messages = [
                "phone.regex" => "The phone number must start with '07' and be 10 digits long.",
            ]
        );

        if ($request->password == $request->confirmPassword) {
            $customer = new Customer;
            $customer->name = $request->names;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->password = bcrypt($request->password);
            $customer->save();
            return redirect('/');
        } else {
            return redirect('/register')->withErrors('Passwords not match');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                "password" => "required",
                "confirmPassword" => "required",
                "address" => "required",
                "phone" => "required|numeric|regex:/^07\d{8}$/"
            ],
            $messages = [
                "phone.regex" => "The phone number must start with '07' and be 10 digits long.",
            ]
        );

        if ($request->password == $request->confirmPassword) {
            $customer = Customer::where("id", Auth::guard('customer')->id())->first();
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->password = bcrypt($request->password);
            $customer->update();
            return redirect('/customer/settings');
        } else {
            return redirect("/customer/settings")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
