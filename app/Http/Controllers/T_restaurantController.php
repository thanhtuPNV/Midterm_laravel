<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_restaurant;
use App\Models\Category;

class T_restaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t_restaurants = T_restaurant::get();
        return view('show',['t_restaurants'=>$t_restaurants]);
    }

    // message
    public function message()
    {
        return [
            'name_food.required' => 'Name_food bắt buộc phải nhập!',
            'description.required' => 'Description bắt buộc phải nhập!',
            'price.required' => 'Price bắt buộc phải nhập!',
            'image.required' => 'Image bắt buộc phải chọn!',
            'price.integer' => 'Price phải là số!',
        ];
    }
    // message

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("edit", ["action" => "create"],compact('categories'));
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
            'name_food'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'image'=>'required',
        ],$this->message());

        $t_restaurant= new T_restaurant();
        $t_restaurant -> name_food = $request->name_food;
        $t_restaurant -> description = $request->description;
        $t_restaurant -> price = $request->price;
        $t_restaurant -> image = $request->image;
        $t_restaurant -> id_category = $request->id_category;
        $t_restaurant->save();
        return redirect("/t_restaurants")->with('status','Create success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()

    {
        // $restaurant = T_restaurant::find($id);
        // $t_restaurant = T_restaurant::join('categories', 'categories.id', 't_restaurant.id_category')
        //     ->select('categories.categories as categories', 't_restaurant.*')
        //     ->get();
        // dd($t_restaurant);
        return view("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
