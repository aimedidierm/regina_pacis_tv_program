<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $admin = User::where('id', Auth::id())->first();
        return view('admin.settings', ["data" => $admin]);
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
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
            $admin = User::where("id", Auth::id())->first();
            $admin->password = bcrypt($request->password);
            $admin->update();
            return redirect('/admin/settings');
        } else {
            return redirect("/admin/settings")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
