<?php

namespace Store\Http\Controllers\Test;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Store\Http\Controllers\Controller;
use Image;

class TestsController extends Controller
{
    public function index()
    {
        return view('test.index');
    }

    public function newfolder(Request $request)
    {
        $path = "/uploads/products/$request->putanja/";

        $i = 1;

        foreach ($request->file('image') as $image) {
            $filename = time() ."$i". '.' . $image->getClientOriginalExtension();

            if (!is_dir(public_path() . "/uploads/products/$request->putanja")) {
                File::makeDirectory(public_path() . "/uploads/products/$request->putanja");
                Image::make($image)->resize(100, 100)->save(public_path($path . $filename));
            }

            Image::make($image)->resize(100, 100)->save(public_path($path . $filename));
            $i = $i + 2;
        }

        return view('test.index',compact('path','filename'));
    }
}
