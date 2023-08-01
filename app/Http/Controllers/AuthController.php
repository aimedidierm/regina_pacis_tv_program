<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = User::where('email', $email)->first();
        $tv = Tv::where('email', $email)->first();
        $customer = Customer::where('email', $email)->first();
        if ($admin != null) {
            $passwordMatch = Hash::check($password, $admin->password);
            if ($passwordMatch) {
                Auth::login($admin);
                return redirect("/admin/tv");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($tv != null) {
            $passwordMatch = Hash::check($password, $tv->password);
            if ($passwordMatch) {
                Auth::guard("tv")->login($tv);
                return redirect("/tv");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($customer != null) {
            $passwordMatch = Hash::check($password, $customer->password);
            if ($passwordMatch) {
                Auth::guard("customer")->login($customer);
                return redirect("/customer/application");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect('/')->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route("login"));
        } else if (Auth::guard('tv')->check()) {
            Auth::guard("tv")->logout();
            return redirect(route("login"));
        } else if (Auth::guard('customer')->check()) {
            Auth::guard("customer")->logout();
            return redirect(route("login"));
        }
    }
}
