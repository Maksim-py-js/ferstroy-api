<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ResidentialComplex;
use App\Models\Advantage;
use App\Models\MapMarker;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;

class ResidentialComplexesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residential_complexes = ResidentialComplex::all();
        $data = [];
        foreach ($residential_complexes as $residential_complex) {
            $features_residential_complex = $residential_complex->features_residential_complexes('residential_complex_id')->get();
            $features_appartments = $residential_complex->features_appartments('residential_complex_id')->get();
            $gallery_residential_complex = $residential_complex->gallery_residential_complex('residential_complex_id')->get();

            $construction_progress_values = $residential_complex->construction_progress('residential_complex_id')->get();

            $construction_progress = [];
            foreach ($construction_progress_values as $construction_progress_value) {
                $construction_progress_date = $residential_complex->construction_progress('residential_complex_id')->get();
                $construction_progress_gallery = $construction_progress_value->construction_progress_gallery('construction_progress_id')->get();
                array_push($construction_progress, compact('construction_progress_date', 'construction_progress_gallery'));
            }


            $residential_complex_houses_values = $residential_complex->residential_complex_houses('residential_complex_id')->get();

            $residential_complex_houses = [];
            foreach ($residential_complex_houses_values as $residential_complex_houses_value) {
                $residential_complex_house = $residential_complex->residential_complex_houses('residential_complex_id')->get();
                $residential_complex_house_descriptions = $residential_complex_houses_value->residential_complex_house_descriptions('residential_complex_house_id')->get();
                array_push($residential_complex_houses, compact('residential_complex_house', 'residential_complex_house_descriptions'));
            }

            $comments = $residential_complex->comments('residential_complex_id')->get();
            $advantages = $residential_complex->advantages('residential_complex_id')->get();

            $residential_complex_advantages = [];
            foreach ($advantages as $advantage_value) {
                $advantages_icons = $advantage_value->advantages_icons()->get();
                $advantage = $advantage_value;
                foreach ($advantages_icons as $advantage_icon) {
                    $icon_id = Advantage::find($advantage_icon->icon_id);
                }
                array_push($residential_complex_advantages, compact('advantage', 'advantages_icons'));
            }

            $map_marker = $residential_complex->map_marker()->get();
            foreach ($map_marker as $map_marker_value) {
                $marker_id = MapMarker::find($map_marker_value->marker_id);
            }


            $residential_complex_value = $residential_complex;
            array_push($data, compact(
                'residential_complex_value',
                'features_residential_complex',
                'features_appartments',
                'gallery_residential_complex',
                'construction_progress',
                'residential_complex_houses',
                'comments',
                'residential_complex_advantages',
                'map_marker'
            ));
        }
        return json_encode($data);
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

        $residential_complex = new ResidentialComplex();

        $file->move(public_path('images/residential_complex_main_image'), $fullName);



        $residential_complex->image = env("APP_URL", 'http://localhost').'/images/residential_complex_main_image/' . $fileName . '.' . $extension;

//        Storage::put($fullName, $request->$file('image'));
//        Storage::put('images/residential_complex_main_image/'.$fullName, $request->$file('image'));

        $residential_complex->name = $request['name'];
        $residential_complex->title = $request['title'];
        $residential_complex->rating = $request['rating'];


        $residential_complex->number = $request['number'];
        $residential_complex->address = $request['address'];
        $residential_complex->email = $request['email'];

        $residential_complex->about_title = $request['about_title'];
        $residential_complex->about_description = $request['about_description'];

        $residential_complex->advantages_title = $request['advantages_title'];
        $residential_complex->comments_title = $request['comments_title'];
        $residential_complex->marker_id = $request['marker_id'];

        $residential_complex->save();
        return $residential_complex;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residential_complex = ResidentialComplex::find($id);
        $data = [];

        $features_residential_complex = $residential_complex->features_residential_complexes('residential_complex_id')->get();
        $features_appartments = $residential_complex->features_appartments('residential_complex_id')->get();
        $gallery_residential_complex = $residential_complex->gallery_residential_complex('residential_complex_id')->get();

        $construction_progress_values = $residential_complex->construction_progress('residential_complex_id')->get();

        $construction_progress = [];
        foreach ($construction_progress_values as $construction_progress_value) {
            $construction_progress_date = $residential_complex->construction_progress('residential_complex_id')->get();
            $construction_progress_gallery = $construction_progress_value->construction_progress_gallery('construction_progress_id')->get();
            array_push($construction_progress, compact('construction_progress_date', 'construction_progress_gallery'));
        }

        $residential_complex_houses_values = $residential_complex->residential_complex_houses('residential_complex_id')->get();

        $residential_complex_houses = [];
        foreach ($residential_complex_houses_values as $residential_complex_houses_value) {
            $residential_complex_house = $residential_complex->residential_complex_houses('residential_complex_id')->get();
            $residential_complex_house_descriptions = $residential_complex_houses_value->residential_complex_house_descriptions('residential_complex_house_id')->get();
            array_push($residential_complex_houses, compact('residential_complex_house', 'residential_complex_house_descriptions'));
        }

        $comments = $residential_complex->comments('residential_complex_id')->get();
        $advantages = $residential_complex->advantages('residential_complex_id')->get();

        $residential_complex_advantages = [];
        foreach ($advantages as $advantage_value) {
            $advantages_icons = $advantage_value->advantages_icons()->get();
            $advantage = $advantage_value;
            foreach ($advantages_icons as $advantage_icon) {
                $icon_id = Advantage::find($advantage_icon->icon_id);
            }
            array_push($residential_complex_advantages, compact('advantage', 'advantages_icons'));
        }

        $map_marker = $residential_complex->map_marker()->get();
        foreach ($map_marker as $map_marker_value) {
            $marker_id = MapMarker::find($map_marker_value->marker_id);
        }

        array_push($data, compact(
    'residential_complex',
    'features_residential_complex',
            'features_appartments',
            'gallery_residential_complex',
            'construction_progress',
            'residential_complex_houses',
            'comments',
            'residential_complex_advantages',
            'map_marker'
        ));

        return json_encode($data);

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
        $residential_complex = ResidentialComplex::find($id);
        $residential_complex->image = $request['image'];
        $residential_complex->name = $request['name'];
        $residential_complex->title = $request['title'];
        $residential_complex->rating = $request['rating'];

        $residential_complex->number = $request['number'];
        $residential_complex->address = $request['address'];
        $residential_complex->email = $request['email'];

        $residential_complex->about_title = $request['about_title'];
        $residential_complex->about_description = $request['about_description'];

        $residential_complex->advantages_title = $request['advantages_title'];
        $residential_complex->comments_title = $request['comments_title'];
        $residential_complex->marker_id = $request['marker_id'];

        $residential_complex->save();
        return $residential_complex;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $residential_complex = ResidentialComplex::find($id);
        if (false != $residential_complex) {

            $image_value = explode('/', $residential_complex->image);
            ob_start();
            echo end ($image_value);
            $image_name = ob_get_clean();

            File::delete('images/residential_complex_main_image/'.$image_name);

            $residential_complex->delete();
            return "This $residential_complex->name was deleted";
        } else {
            return "This Post was deleted erlier";
        }
    }
}
