<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConstructionProgressGallery;

class ConstructionProgressGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $construction_progress_gallery = ConstructionProgressGallery::all();
        return $construction_progress_gallery;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $file = $request->file('image');
        $name = date('dmyhis');
        $extension = $file->getClientOriginalExtension();
        $fullName = ($name . '.' . $extension);
        $file->move(public_path('images/construction_progress_gallery'), $fullName);

        $construction_progress_gallery = new ConstructionProgressGallery();
        $construction_progress_gallery->image = env("APP_URL", 'http://localhost').'/images/construction_progress_gallery/' . $name . '.' . $extension;
        $construction_progress_gallery->construction_progress_id = $request['construction_progress_id'];
        $construction_progress_gallery->save();
        return $construction_progress_gallery;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $construction_progress_gallery = ConstructionProgressGallery::find($id);
        return $construction_progress_gallery;
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
        $construction_progress_gallery = ConstructionProgressGallery::find($id);

        if ($request['image']) {
            $construction_progress_gallery->image = env("APP_URL", 'http://localhost').'/images/construction_progress_gallery/'.$request['image'];
        }
        $construction_progress_gallery->construction_progress_id = $request['construction_progress_id'];
        $construction_progress_gallery->save();
        return $construction_progress_gallery;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $construction_progress_gallery = ConstructionProgressGallery::find($id);

        if (false != $construction_progress_gallery) {

            $image_value = explode('/', $construction_progress_gallery->image);
            ob_start();
            echo end ($image_value);
            $image_name = ob_get_clean();

            unlink('images/construction_progress_gallery/'.$image_name);

            $construction_progress_gallery->delete();
            return "This Image was deleted";
        } else {
            return "This Image was deleted erlier";
        }
    }
}
