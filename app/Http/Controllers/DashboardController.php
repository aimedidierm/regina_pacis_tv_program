<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function tv()
    {
        $customers = 40;
        $activeCustomers = 20;
        $waitingPayment = 24;
        $income = 300;
        return view('tv.dashboard', ["customers" => $customers, "activeCustomers" => $activeCustomers, "waitingPayment" => $waitingPayment, "income" => $income]);
    }

    public function customer()
    {
        return view('customer.dashboard');
    }
}
