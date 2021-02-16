<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturesAppartment;

class FeaturesAppartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features_appartments = FeaturesAppartment::all();
        return $features_appartments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $features_appartment = new FeaturesAppartment();

        $features_appartment->name = $request['name'];
        $features_appartment->description = $request['description'];
        $features_appartment->residential_complex_id = $request['residential_complex_id'];

        $features_appartment->save();
        return $features_appartment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $features_appartments = FeaturesAppartment::find($id);
        return $features_appartments;
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
        $features_appartment = FeaturesAppartment::find($id);

        $features_appartment->name = $request['name'];
        $features_appartment->description = $request['description'];
        $features_appartment->residential_complex_id = $request['residential_complex_id'];

        $features_appartment->save();
        return $features_appartment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $features_appartment = FeaturesAppartment::find($id);
        if (false != $features_appartment) {
            $features_appartment->delete();
            return "This $features_appartment->name was deleted";
        } else {
            return "This feature appartment was deleted erlier";
        }
    }
}
