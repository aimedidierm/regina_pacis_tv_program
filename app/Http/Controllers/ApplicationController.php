<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = Application::latest()->where('status', 'pending')->get();
        $application->load('customers', 'categories', 'subcategories');
        // return $application;
        return view('tv.applications', ["data" => $application]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $application->load('customers', 'categories', 'subcategories');
        // return $application;
        return view('tv.details', ['data' => $application]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {

        $application->delete();
        return redirect('/tv/applications');
    }

    public function customerList()
    {
        $applications = Application::latest()->where('customer_id', Auth::guard('customer')->id())->get();
        return view('customer.application', ["data" => $applications]);
    }
}
