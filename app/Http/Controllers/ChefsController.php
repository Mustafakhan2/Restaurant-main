<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use App\Models\User;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.chefs.create');
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
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required',
            'nationality' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imageName = time() . 'chef' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $imageName);
        $data = new Chefs();
        $data->name = $request["name"];
        $data->speciality = $request["speciality"];
        $data->nationality = $request["nationality"];
        $data->image = $imageName;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Chefs::all();
        return view('admin.chefs.cheftable', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editchef = Chefs::find($id);
        $data = compact(['editchef']);
        return view('admin.chefs.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Chefs::find($id);
        $data->name = $request['name'];
        $data->speciality = $request['speciality'];
        $data->nationality = $request['nationality'];
        $data->image = $request['image'];
        $data->save();
        return redirect()->route('chefs.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deluser = Chefs::find($id);
        $deluser->delete();
        return redirect()->route('chefs.show');
    }
}
