<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapMarker;
use Illuminate\Support\Facades\File;

class MapMarkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map_markers = MapMarker::all();
        return $map_markers;
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
        $fileName = date('dmyhis');
        $extension = $file->getClientOriginalExtension();
        $fullName = ($fileName . '.' . $extension);

        $map_marker = new MapMarker();

        $file->move(public_path('images/map_markers'), $fullName);
        $map_marker->image = env("APP_URL", 'http://localhost').'/images/map_markers/' . $fileName . '.' . $extension;

        $map_marker->markerX = $request['markerX'];
        $map_marker->markerY = $request['markerY'];

        $map_marker->save();
        return $map_marker;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $map_marker = MapMarker::find($id);
        return $map_marker;
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
        $map_marker = MapMarker::find($id);

        if ($request['image']) {
            $map_marker->image = env("APP_URL", 'http://localhost').'/images/map_markers/'.$request['image'];
        }
        $map_marker->markerX = $request['markerX'];
        $map_marker->markerY = $request['markerY'];
        $map_marker->save();
        return $map_marker;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map_marker = MapMarker::find($id);
        if (false != $map_marker) {

            $image_value = explode('/', $map_marker->image);
            ob_start();
            echo end ($image_value);
            $image_name = ob_get_clean();

            File::delete('images/map_markers/'.$image_name);

            $map_marker->delete();
            return "This Map Marker was deleted";
        } else {
            return "This Map Marker was deleted erlier";
        }
    }
}
