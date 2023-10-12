<?php

namespace App\Http\Controllers;

use App\Models\TableReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableRes extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();
            $usertype = $user->usertype;

            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'number-guests' => 'required|integer',
                'date' => 'required|date',
                'time' => 'required|string',
                'message' => 'required|string',
            ]);

            if ($usertype == "0") {
                $data = new TableReservation();
                $data->name = $validatedData["name"];
                $data->email = $validatedData["email"];
                $data->pn = $validatedData["phone"];
                $data->nog = $validatedData['number-guests'];
                $data->dmy = $validatedData['date'];
                $data->time = $validatedData['time'];
                $data->message = $validatedData['message'];
                $data->save();

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = TableReservation::where('status', 'pending')->get();

        return view('admin.reservations.restable', compact('data'));
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deluser = TableReservation::find($id);
        $deluser->delete();
        return redirect()->route('tbres.show');
    }
    public function accept(string $id)
    {
        $res = TableReservation::find($id);
        $res->status = "done";
        $res->save();
        return redirect()->back();
    }
    public function showres(Request $request)
    {
        $reservation = TableReservation::where('status', 'done')->get();

        return view('admin.reservations.accrestbl', compact('reservation'));
        return redirect()->back();
    }
}
