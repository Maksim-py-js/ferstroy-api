<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturesResidentialComplex;

class FeaturesResidentialComplexesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features_residential_complexes = FeaturesResidentialComplex::all();
        return $features_residential_complexes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $features_residential_complex = new FeaturesResidentialComplex();

        $features_residential_complex->name = $request['name'];
        $features_residential_complex->description = $request['description'];
        $features_residential_complex->residential_complex_id = $request['residential_complex_id'];

        $features_residential_complex->save();
        return $features_residential_complex;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $features_residential_complex = FeaturesResidentialComplex::find($id);
        return $features_residential_complex;
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
        $features_residential_complex = FeaturesResidentialComplex::find($id);

        $features_residential_complex->name = $request['name'];
        $features_residential_complex->description = $request['description'];
        $features_residential_complex->residential_complex_id = $request['residential_complex_id'];

        $features_residential_complex->save();
        return $features_residential_complex;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $features_residential_complex = FeaturesResidentialComplex::find($id);
        if (false != $features_residential_complex) {
            $features_residential_complex->delete();
            return "This $features_residential_complex->name was deleted";
        } else {
            return "This feature residential complex was deleted erlier";
        }
    }
}
