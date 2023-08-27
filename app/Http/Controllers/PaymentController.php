<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Paypack\Paypack;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'number' => 'required|numeric|regex:/^07\d{8}$/',
                'application' => 'required|numeric',
            ],
            $messages = [
                'number.regex' => 'The phone number must start with "07" and be 10 digits long.',
            ]
        );

        $application = Application::find($request->application);

        $paypackInstance = $this->paypackConfig()->Cashin([
            "amount" => $application->price,
            "phone" => $request->number,
        ]);

        $ref = Str::random(6);
        $payment = new Payment;
        $payment->phone = $request->number;
        $payment->application_id = $request->application;
        $payment->ref = $ref;
        $payment->save();
        $application->status = 'payed';
        $application->update();
        return redirect('/customer/payments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function paypackConfig()
    {
        $paypack = new Paypack();

        $paypack->config([
            'client_id' => env('PAYPACK_CLIENT_ID'),
            'client_secret' => env('PAYPACK_CLIENT_SECRET'),
        ]);

        return $paypack;
    }
}
