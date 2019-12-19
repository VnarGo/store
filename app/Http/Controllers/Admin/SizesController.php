<?php

namespace Store\Http\Controllers\Admin;

use Store\Size;
use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();

        return view('admin.sizes.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();

        return view('admin.sizes.create',compact('sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Size::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Store\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sizes = Size::where('id',$id)->get();

        return view('admin.sizes.show',compact('sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Store\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Store\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Store\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
    }
}
