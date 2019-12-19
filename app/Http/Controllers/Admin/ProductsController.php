<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Builder;
use function PHPSTORM_META\elementType;
use Store\Gender;
use Store\Http\Controllers\Controller;
use Store\Http\Requests\UpdateProductRequest;
use Store\Photo;
use Store\Size;
use Store\Subcategory;
use Symfony\Component\HttpFoundation\Response;
use Store\Product;
use Store\Brand;
use Illuminate\Http\Request;
use Store\Role;
use Store\User;
use Auth;
use Gate;
use Image;
use File;

use Illuminate\Support\Arr;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_access'),403);

        $products = Product::all();

        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_create'), 403);

        $products = Brand::all()->pluck('name','id');

        $genders = Gender::all()->pluck('gender','id');

        $sizes = Size::all()->pluck('size','id');

        $subcategories = Subcategory::all()->pluck('name','id');

        return view('admin.products.create',compact('products','genders','subcategories','sizes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        abort_if(Gate::denies('product_create'), 403);

        $product = Product::create($request->all());

        $product->genders()->sync($request->input('genders', []));

        $product->sizes()->sync($request->input('sizes', []));

        $product->brand()->sync($request->input('brand', []));// vraca ID branda

        $product->subcategories()->sync($request->input('subcategories', []));

        $path = "/uploads/products/$product->id/";

        $i = 1;

        foreach ($request->file('image') as $image) {
            $filename = time() ."$i". '.' . $image->getClientOriginalExtension();

            if (!is_dir(public_path() . "/uploads/products/$product->id")) {
                File::makeDirectory(public_path() . "/uploads/products/$product->id");
                Image::make($image)->resize(600, 500)->save(public_path($path . $filename));
            }

            Image::make($image)->resize(600, 600)->save(public_path($path . $filename));

            $photo = new Photo([
                'path' => $filename
                ]);
            $photo->save();

            $photo->products()->sync($product->id);

            $i = $i + 2;
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), 403);

        $product->load('brand','photos','genders','subcategories','sizes');

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), 403);

        $brand = Brand::all()->pluck('name','id');

        $photos = Photo::all()->pluck('path','id');

        $genders = Gender::all()->pluck('gender','id');

        $sizes = Size::all()->pluck('size','id');

        $subcategories = Subcategory::all()->pluck('name','id');

        $product->load('brand','photos','genders','subcategories');

        return view('admin.products.edit', compact('product','brand','photos','genders','subcategories','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,Photo $photo)
    {
//return $request;

        abort_if(Gate::denies('product_edit'), 403);

        $product->update($request->all());

        $product->brand()->sync($request->input('brand', []));

        $product->genders()->sync($request->input('genders', []));

        $product->sizes()->sync($request->input('sizes', []));

        $product->subcategories()->sync($request->input('subcategories', []));

        $path = "/uploads/products/$product->id/";

        $i = 1;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . "$i" . '.' . $image->getClientOriginalExtension();

                if (!is_dir(public_path() . "/uploads/products/$product->id")) {
                    File::makeDirectory(public_path() . "/uploads/products/$product->id");
                    Image::make($image)->resize(600, 500)->save(public_path($path . $filename));
                }

                Image::make($image)->resize(600, 600)->save(public_path($path . $filename));

                $photo = new Photo([
                    'path' => $filename
                ]);
                $photo->save();

                $photo->products()->sync($product->id);

                $i = $i + 2;
            }
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'),  403);

        $product->delete();

        return back();    
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}








