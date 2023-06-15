<?php

namespace App\Http\Controllers;

use App\Models\Tv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TvController extends Controller
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
        $tv = Tv::where('id', Auth::guard('tv')->id())->first();
        return view('tv.settings', ["data" => $tv]);
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
    public function show(Tv $tv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tv $tv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "password" => "required",
            "confirmPassword" => "required"
        ]);

        if ($request->password == $request->confirmPassword) {
            $tv = Tv::where("id", Auth::guard('tv')->id())->first();
            $tv->password = bcrypt($request->password);
            $tv->update();
            return redirect('/tv/settings');
        } else {
            return redirect("/tv/settings")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tv $tv)
    {
        //
    }
}
