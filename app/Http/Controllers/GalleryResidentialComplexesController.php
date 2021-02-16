<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryResidentialComplex;

class GalleryResidentialComplexesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_residential_complexes = GalleryResidentialComplex::all();
        return $gallery_residential_complexes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $name = date('dmyhis');
        $extension = $file->getClientOriginalExtension();

        $fullName = ($name . '.' . $extension);

        $file->move(public_path('images/gallery_residential_complexes'), $fullName);

//        $validation = \Validator::make($request->all(), [
//            'image' => 'mimes:jpg,jpeg,svg,png'
//        ]);
//        if ($validation->fails()) {
//            return $validation->errors();
//        }

        $gallery_residential_complex = new GalleryResidentialComplex();
        $gallery_residential_complex->image = env("APP_URL", 'http://localhost').'/images/gallery_residential_complexes/' . $name . '.' . $extension;
        $gallery_residential_complex->residential_complex_id = $request['residential_complex_id'];
        $gallery_residential_complex->save();
        return $gallery_residential_complex;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery_residential_complex = GalleryResidentialComplex::find($id);
        return $gallery_residential_complex;
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
        $gallery_residential_complex = GalleryResidentialComplex::find($id);

        if ($request['image']) {
            $gallery_residential_complex->image = env("APP_URL", 'http://localhost').'/images/gallery_residential_complexes/'.$request['image'];
        }
        $gallery_residential_complex->residential_complex_id = $request['residential_complex_id'];
        $gallery_residential_complex->save();
        return $gallery_residential_complex;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery_residential_complex = GalleryResidentialComplex::find($id);

        if (false != $gallery_residential_complex) {

            $image_value = explode('/', $gallery_residential_complex->image);
            ob_start();
            echo end ($image_value);
            $image_name = ob_get_clean();

            unlink('images/gallery_residential_complexes/'.$image_name);

            $gallery_residential_complex->delete();
            return "This Image was deleted";
        } else {
            return "This Image was deleted erlier";
        }
    }
}
