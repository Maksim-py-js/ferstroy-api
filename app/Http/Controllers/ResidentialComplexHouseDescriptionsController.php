<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentialComplexHouseDescription;

class ResidentialComplexHouseDescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residential_complex_house_descriptions = ResidentialComplexHouseDescription::all();
        return $residential_complex_house_descriptions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $residential_complex_house_description = new ResidentialComplexHouseDescription();

        $residential_complex_house_description->name = $request['name'];
        $residential_complex_house_description->text = $request['text'];

        $residential_complex_house_description->is_open = $request['is_open'];

        $residential_complex_house_description->positionTop = $request['positionTop'];
        $residential_complex_house_description->positionRight = $request['positionRight'];
        $residential_complex_house_description->positionBottom = $request['positionBottom'];
        $residential_complex_house_description->positionLeft = $request['positionLeft'];

        $residential_complex_house_description->residential_complex_house_id = $request['residential_complex_house_id'];

        $residential_complex_house_description->save();
        return $residential_complex_house_description;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residential_complex_house_description = ResidentialComplexHouseDescription::find($id);
        return $residential_complex_house_description;
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
        $residential_complex_house_description = ResidentialComplexHouseDescription::find($id);

        $residential_complex_house_description->name = $request['name'];
        $residential_complex_house_description->text = $request['text'];

        $residential_complex_house_description->is_open = $request['is_open'];

        $residential_complex_house_description->positionTop = $request['positionTop'];
        $residential_complex_house_description->positionRight = $request['positionRight'];
        $residential_complex_house_description->positionBottom = $request['positionBottom'];
        $residential_complex_house_description->positionLeft = $request['positionLeft'];

        $residential_complex_house_description->residential_complex_house_id = $request['residential_complex_house_id'];

        $residential_complex_house_description->save();
        return $residential_complex_house_description;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $residential_complex_house_description = ResidentialComplexHouseDescription::find($id);
        if (false != $residential_complex_house_description) {

            $residential_complex_house_description->delete();
            return "This House description was deleted";
        } else {
            return "This House description was deleted erlier";
        }
    }
}
