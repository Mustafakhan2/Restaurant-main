<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dishes.create');
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
            'dishname' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'recipe' => 'required',
            'description' => 'required',

        ]);
        $imageName = time() . 'dish' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $imageName);
        $data = new Dishes();
        $data->name = $request["dishname"];
        $data->image = $imageName;
        $data->recipe = $request["recipe"];
        $data->description = $request["description"];
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Dishes::all();
        return view('admin.dishes.dishestable', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editdish = Dishes::find($id);
        $data = compact(['editdish']);
        return view('admin.dishes.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Dishes::find($id);
        $data->name = $request['dishname'];
        $data->image = $request['image'];
        $data->recipe = $request['recipe'];
        $data->description = $request['description'];
        $data->save();
        return redirect()->route('dishes.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deluser = Dishes::find($id);
        $deluser->delete();
        return redirect()->route('dishes.show');
    }
}
