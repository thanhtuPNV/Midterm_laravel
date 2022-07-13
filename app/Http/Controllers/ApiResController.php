<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_restaurant;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ApiResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $t_restaurants = T_restaurant::join('categories', 'categories.id', 't_restaurants.id_category')
        //         ->select('categories.name_categoty as name_categoty', 't_restaurants.*')->get();
        // if ($t_restaurants){
        //     return response()->json($t_restaurants, Response::HTTP_OK);
        // }
        // else{
        //     return response()->json([]);
        // }
        // //
        if (!isset($request->search))
            $t_restaurants = T_restaurant::join('categories', 'categories.id', 't_restaurants.id_category')
                ->select('categories.name_categoty as name_categoty', 't_restaurants.*')
                ->get();
        else {
            $t_restaurants = T_restaurant::join('categories', 'categories.id', 't_restaurants.id_category')
                ->orWhere('name_food', 'like', '%' . $request->search . '%')
                ->orWhere('price', '<=',  $request->search)
                ->select('categories.name_categoty as name_categoty', 't_restaurants.*')
                ->get();
        }
        return response()->json($t_restaurants, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $t_restaurants = T_restaurant::join('categories', 'categories.id', 't_restaurants.id_category')
                ->select('categories.name_categoty as name_categoty', 't_restaurants.*')->get();
        if ($t_restaurants){
            return response()->json($t_restaurants, Response::HTTP_OK);
        }
        else{
            return response()->json([]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    public function statistical()
    {
        $count_category = T_restaurant::join('categories', 'categories.id', 't_restaurants.id_category')
            ->selectRaw('categories.name_categoty, count(*) as total')
            ->groupBy('categories.name_categoty')->get();
        return response()->json($count_category, Response::HTTP_OK);     
    }
}
