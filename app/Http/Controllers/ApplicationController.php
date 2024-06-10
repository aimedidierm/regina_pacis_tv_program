<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Subcategory;
use App\Services\Sms;
use Carbon\Carbon;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = Application::latest()->where('status', 'pending')->get();
        $application->load('customers', 'categories', 'subcategories');
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
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|numeric',
            'subcategory' => 'required|numeric',
            'video' => 'required|file'
        ]);
        $subcategory = Subcategory::find($request->subcategory)->load('prices');
        $selectedPrice = null;
        foreach ($subcategory->prices as $price) {
            if ($request->duration <= $price->time) {
                $selectedPrice = $price;
                break;
            } else {
                return back()->withErrors("Video duration is too large");
            }
        }

        $uniqueid = uniqid();
        $extension = $request->file('video')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;
        $file = $request->file('video');
        Storage::disk('public')->put($filename, file_get_contents($file));
        $fileUrl = Storage::url($filename);

        $application = new Application;
        $application->title = $request->name;
        $application->descrption = $request->description;
        $application->video = $fileUrl;
        $application->price = $selectedPrice['price'];
        $application->customer_id = Auth::id();
        $application->category_id = $request->category;
        $application->subcategory_id = $request->subcategory;
        $application->status = 'pending';
        $application->created_at = now();
        $application->updated_at = null;
        $application->save();
        return redirect('/customer/application');
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
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->load('customers');
        $message = "Hello " . $application->customers->name . " your application at Regina pacis TV had been Rejected.";
        $sms = new Sms();
        $sms->recipients([$application->customers->phone])
            ->message($message)
            ->sender(env('SMS_SENDERID'))
            ->username(env('SMS_USERNAME'))
            ->password(env('SMS_PASSWORD'))
            ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
            ->callBackUrl("");
        $sms->send();
        $application->delete();
        return back();
    }

    public function customerList()
    {
        $categories = Category::all()->load('subcategories.prices');
        $applications = Application::latest()->where('customer_id', Auth::guard('customer')->id())->get();
        $applications->load('categories', 'subcategories');
        return view('customer.application', ["data" => $applications, "categories" => $categories]);
    }

    public function payment()
    {
        $applications = Application::latest()->where('customer_id', Auth::guard('customer')->id())->where('status', 'approved')->get();
        $applications->load('categories', 'subcategories');
        return view('customer.payments', ["data" => $applications]);
    }

    public function approveApplication(Application $application)
    {
        $application->load('customers');
        $application->status = 'approved';
        $application->update();
        $message = "Hello " . $application->customers->name . " your application at Regina pacis TV had been approved you can make payment thank you.";
        $sms = new Sms();
        $sms->recipients([$application->customers->phone])
            ->message($message)
            ->sender(env('SMS_SENDERID'))
            ->username(env('SMS_USERNAME'))
            ->password(env('SMS_PASSWORD'))
            ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
            ->callBackUrl("");
        $sms->send();
        return redirect('/tv/applications');
    }

    public function waiting()
    {
        $applications = Application::where('status', 'approved')->get();
        return view('tv.pendingPayment', ['data' => $applications]);
    }

    public function approved()
    {
        $applications = Application::where('status', 'payed')->get();
        return view('tv.approved', ['data' => $applications]);
    }

    public function report()
    {
        $data = Application::where('status', 'payed')->get();
        $pdf = Pdf::loadView('tv.report', ['data' => $data]);
        return $pdf->download('approvedList.pdf');
    }
}
