<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Chefs;
use App\Models\Dishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.dishes.create',
            ['cat' => Category::all()]
        );
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
            'price' => 'required|integer|min:0|max:1000'

        ]);
        $imageName = time() . 'dish' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $imageName);
        $data = new Dishes();
        $data->name = $request["dishname"];
        $data->image = $imageName;
        $data->recipe = $request["recipe"];
        $data->description = $request["description"];
        $data->price = $request["price"];
        $data->category = $request['selected_option'];
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Dishes::all();
        $cat = Category::all();
        return view('admin.dishes.dishestable', compact('data', 'cat'));
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
    public function showDishes()
    {
        $dishes = Dishes::all();
        $chefs = Chefs::all();
        $category = Category::all();
        if (auth()->check()) {
            $user = Auth()->user();
            $count = Cart::where('email', $user->email)->count();
            return view('home', compact('count', 'dishes', 'chefs', 'category'));
        }
        return view('home', compact('dishes', 'chefs', 'category'));
    }

    public function addcart(Request $request,  $id)
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $product = Dishes::find($id);
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->dish_name = $product->name;
            $cart->price = $product->price;
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function showCart()
    {

        $user = Auth()->user();
        $cart = Cart::where('email', $user->email)->get();
        $count = Cart::where('email', $user->email)->count();
        return view('showcart', compact('count', 'cart'));
    }
    public function delcart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
}
