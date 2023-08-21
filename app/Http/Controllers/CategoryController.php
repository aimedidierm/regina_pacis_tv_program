<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Price;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('tv.categories', ["data" => $categories]);
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
            "title" => "required",
            "description" => "sometimes"
        ]);
        $category = new Category;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect('/tv/package');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/tv/package');
    }

    public function package()
    {
        $firstSubcategories = Subcategory::latest()->get();
        $firstCategories = Category::latest()->get();
        $firstPrices = Price::latest()->get();
        $categories = Category::with('subcategories.prices')->latest()->get();
        $categories = Category::with('subcategories.prices')->latest()->get();
        $jsonData = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
                'description' => $category->description,
                'subcategories' => $category->subcategories->map(function ($subcategory) {
                    return [
                        'id' => $subcategory->id,
                        'title' => $subcategory->title,
                        'description' => $subcategory->description,
                        'prices' => $subcategory->prices->map(function ($price) {
                            return [
                                'id' => $price->id,
                                'title' => $price->title,
                                'description' => $price->description,
                                'time' => $price->time,
                                'price' => $price->price,
                            ];
                        }),
                    ];
                }),
            ];
        });
        return view('tv.package', ['subcategories' => $firstSubcategories, 'categories' => $firstCategories, 'prices' => $firstPrices, 'jsonData' => $jsonData]);
    }
}
