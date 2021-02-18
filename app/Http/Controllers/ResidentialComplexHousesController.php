<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentialComplexHouse;

class ResidentialComplexHousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residential_complex_houses = ResidentialComplexHouse::all();
        $data = [];
        foreach ($residential_complex_houses as $residential_complex_house) {
            $residential_complex_house_descriptions = $residential_complex_house->residential_complex_house_descriptions('residential_complex_house_id')->get();

            $residential_complex_house_value = $residential_complex_house;
            array_push($data, compact(
                'residential_complex_house_value',
                'residential_complex_house_descriptions'
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
            'svg' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $file = $request->file('svg');
        $name = date('dmyhis');
        $extension = $file->getClientOriginalExtension();
        $fullName = ($name . '.' . $extension);
        $file->move(public_path('images/residential_complex_houses'), $fullName);

        $residential_complex_house = new ResidentialComplexHouse();

        $residential_complex_house->svg = env("APP_URL", 'http://localhost').'/images/residential_complex_houses/' . $name . '.' . $extension;
        $residential_complex_house->residential_complex_id = $request['residential_complex_id'];

        $residential_complex_house->save();
        return $residential_complex_house;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residential_complex_house = ResidentialComplexHouse::find($id);
        $data = [];
        $residential_complex_house_descriptions = $residential_complex_house->residential_complex_house_descriptions('residential_complex_house_id')->get();

        $residential_complex_house_value = $residential_complex_house;
        array_push($data, compact(
            'residential_complex_house_value',
            'residential_complex_house_descriptions'
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
        $residential_complex_house = ResidentialComplexHouse::find($id);

        if ($request['svg']) {
            $residential_complex_house->svg = env("APP_URL", 'http://localhost').'/images/residential_complex_houses/'.$request['svg'];
        }
        $residential_complex_house->residential_complex_id = $request['residential_complex_id'];

        $residential_complex_house->save();
        return $residential_complex_house;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $residential_complex_house = ResidentialComplexHouse::find($id);
        if (false != $residential_complex_house) {

            $svg_value = explode('/', $residential_complex_house->svg);
            ob_start();
            echo end ($svg_value);
            $svg_name = ob_get_clean();

            unlink('images/residential_complex_houses/'.$svg_name);

            $residential_complex_house->delete();
            return "This House was deleted";
        } else {
            return "This House was deleted erlier";
        }
    }
}
