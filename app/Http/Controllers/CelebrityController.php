<?php

namespace App\Http\Controllers;

use App\Models\Celebrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CelebrityController extends Controller
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celebrities = Celebrity::all();
        return view('admin.celebrity.index', compact('celebrities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.celebrity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'status' => 'required',
            'description' => 'required|max:100'
        ]);

        $image = $request->file('image')->store('public/celebrity');
        $validated['image'] = $image;

        $celebrity = new Celebrity();
        $celebrity->create($validated);

        return redirect()->route('admin.celebrity.index')->with('success', 'Created Successfull !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Celebrity $celebrity)
    {
        //
    }

    public function edit(Celebrity $celebrity)
    {
        return view('admin.celebrity.edit', compact('celebrity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Celebrity $celebrity)
    {
        $celebrity->name = $request->name;
        $celebrity->status = $request->status;
        $celebrity->description = $request->description;
        if ($request->hasFile('image')) {
            Storage::delete($celebrity->image);
            $image = $request->file('image')->store('public/celebrity');
        }
        $celebrity->image = $image;
        $celebrity->save();

        return back()->with('success', 'Updated Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celebrity $celebrity)
    {
        if ($celebrity->image) {
            Storage::delete($celebrity->image);
        }
        $celebrity->delete();
        return back()->with('success', 'Deleted Successfull !');

    }
}
