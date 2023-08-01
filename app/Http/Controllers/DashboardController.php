<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function tv()
    {
        $customers = Customer::count();
        $activeCustomers = Customer::count();
        $waitingPayment = Payment::where('status', 'pending')->count();
        $income = Application::where('status', 'payed')->sum('price');
        return view('tv.dashboard', ["customers" => $customers, "activeCustomers" => $activeCustomers, "waitingPayment" => $waitingPayment, "income" => $income]);
    }

    public function customer()
    {
        return view('customer.dashboard');
    }
}
