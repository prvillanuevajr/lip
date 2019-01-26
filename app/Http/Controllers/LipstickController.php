<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Finish;
use App\Lipstick;
use Illuminate\Http\Request;

class LipstickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lipsticks = Lipstick::with('brand', 'finish')->latest()->get();
        $brands = Brand::all();
        $finishes = Finish::all();
        return view('admin.lipstick.index', compact('lipsticks', 'brands', 'finishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $lipstick = new Lipstick();
        $lipstick->brand_id = $request->brand_id;
        $lipstick->finish_id = $request->finish_id;
        $lipstick->name = $request->name;
        $lipstick->description = $request->description;
        $lipstick->price = $request->price;
        $lipstick->color = $request->color;
        $lipstick->image = $request->image->store('lipsticks_images');
        $lipstick->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lipstick $lipstick
     * @return \Illuminate\Http\Response
     */
    public function show(Lipstick $lipstick)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lipstick $lipstick
     * @return \Illuminate\Http\Response
     */
    public function edit(Lipstick $lipstick)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Lipstick $lipstick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lipstick $lipstick)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lipstick $lipstick
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lipstick $lipstick)
    {
        //
    }
}
