<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::where('user_id', auth()->user()->id)->get();
        return view('dashboard.listings.index', [
            'title' => 'Dashboard Listing',
            'listings' => $listings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.listings.create', [
            'title' => 'Create Listing',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Listing $listing)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:5|max:255',
            'slug' => 'unique:listings',
            'company' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => 'required|email',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:10250'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::slug($request->title);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('listing__images');
        }

        Listing::create($validatedData);

        return redirect('/dashboard/listings')->with('success', 'Listing Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('dashboard.listings.show', [
            'title' => 'Single Listing',
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('dashboard.listings.edit', [
            'title' => 'Edit Page',
            'listing' => $listing,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'company' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => 'required|email',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:10250'
        ];
        if ($request->slug != $listing->slug) {
            $rules['slug'] = 'required|unique:listings';
            $rules['slug'] = Str::slug($rules['slug']);
        }
        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('listing__images');
        }

        Listing::where('id', $listing->id)->update($validatedData);

        return redirect('/dashboard/listings')->with('success', 'Listing Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if ($listing->image) {
            Storage::delete($listing->image);
        }

        Listing::destroy($listing->id);

        return redirect('/dashboard/listings')->with('message', 'Listing Deleted Successfully!');
    }
}
