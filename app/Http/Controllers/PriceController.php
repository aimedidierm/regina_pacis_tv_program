<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
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
        $request->validate([
            'subcategory' => 'required|numeric',
            'time' => 'required|numeric',
            'price' => 'required|numeric',
            'title' => 'required|string',
        ]);
        $price = new Price;
        $price->title = $request->title;
        $price->descrption = $request->description;
        $price->time = $request->time;
        $price->price = $request->price;
        $price->subcategory_id = $request->subcategory;
        $price->created_at = now();
        $price->updated_at = null;
        $price->save();
        return redirect('/tv/package');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return redirect('/tv/package');
    }
}
