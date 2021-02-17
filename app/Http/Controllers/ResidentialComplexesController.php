<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentialComplex;
use App\Models\ConstructionProgress;

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

            $residential_complex_value = $residential_complex;
            array_push($data, compact(
                'residential_complex_value',
                'features_residential_complex',
                'features_appartments',
                'gallery_residential_complex',
                'construction_progress'
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
        $residential_complex = new ResidentialComplex();

        $residential_complex->name = $request['name'];
        $residential_complex->title = $request['title'];
        $residential_complex->description = $request['description'];

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
        array_push($data, compact('residential_complex', 'features_residential_complex', 'features_appartments', 'gallery_residential_complex'));

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

        $residential_complex->name = $request['name'];
        $residential_complex->title = $request['title'];
        $residential_complex->description = $request['description'];

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
            $residential_complex->delete();
            return "This $residential_complex->name was deleted";
        } else {
            return "This Post was deleted erlier";
        }
    }
}
