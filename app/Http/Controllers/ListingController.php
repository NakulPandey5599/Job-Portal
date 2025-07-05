<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class ListingController extends Controller
{
    public function index()
    {
        return view(
            'listings.index',
            [
                'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
            ]
        );
    }


    public function show(listing $listing)
    {

        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('Listings.create');
    }


    public function store(Request $request, Listing $listing)
    {   //make sure logged in user is ower
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unathorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'logo' => 'image|nullable',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'listing created succesfully!');
    }

    //Show Edit from
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Edit Form
    public function update(Request $request, Listing $listing)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required',],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'logo' => 'image|nullable',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'listing updated succesfully!');
    }
    //deldete listing 
    public function destroy(Listing $listing)
    {

        //make sure logged in user is ower
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unathorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'listing delete Succesfully');
    }

    // Manage Listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
