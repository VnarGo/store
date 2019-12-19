<?php

namespace Store\Http\Controllers\Admin;

use foo\bar;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Store\Photo;
use Store\Product;
use Gate;
Use Image;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        return $request;
        abort_if(Gate::denies('photo_create'), 403);

        $path = "/uploads/products/$id/";

        $i = 1;

        foreach ($request->file('image') as $image) {
            $filename = time() ."$i". '.' . $image->getClientOriginalExtension();

            if (!is_dir(public_path() . "/uploads/products/$id")) {
                File::makeDirectory(public_path() . "/uploads/products/$id");
                Image::make($image)->resize(600, 500)->save(public_path($path . $filename));
            }

            Image::make($image)->resize(600, 600)->save(public_path($path . $filename));

            $photo = new Photo([
                'path' => $filename
            ]);
            $photo->save();

            $photo->products()->sync($id);

            $i = $i + 2;
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
