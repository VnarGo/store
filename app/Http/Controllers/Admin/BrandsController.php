<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Store\Brand;
use Store\Http\Controllers\Controller;
use Store\Photo;
use Store\Product;
use Gate;
use Image;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('brand_create'), 403);

        $brands = Brand::all();

        return view('admin.brands.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 500)->save(public_path('/uploads/brands/' . $filename));

            $photo = new Photo([
               'path' => $filename
            ]);
            $photo->save();
       }

        $brand = Brand::create($request->all());
        $brand->photos()->sync( $photo->id);
        //dd($brand);

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brand_show'), 403);

        $brand->load('photos');

        //return $product;

        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        abort_if(Gate::denies('brand_edit'), 403);

        $brand->load('photos');

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        abort_if(Gate::denies('brand_edit'), 403);


        $brand->update($request->all());

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(600, 500)->save(public_path('/uploads/brands/' . $filename));

            Photo::find($brand->photos->first()->id)->update(['path'=>$filename]);
        }

        return redirect()->route('admin.brands.index');
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
