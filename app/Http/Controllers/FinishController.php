<?php

namespace App\Http\Controllers;

use App\Finish;
use Illuminate\Http\Request;

class FinishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finishes = Finish::all();
        return view('admin.finish.index', compact('finishes'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $finish = new Finish();
        $finish->name = $request->name;
        $finish->description = $request->description;
        $finish->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finish $finish
     * @return \Illuminate\Http\Response
     */
    public function show(Finish $finish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finish $finish
     * @return \Illuminate\Http\Response
     */
    public function edit(Finish $finish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Finish $finish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finish $finish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finish $finish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finish $finish)
    {
        //
    }
}
