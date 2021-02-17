<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConstructionProgress;

class ConstructionProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $construction_progress_data = ConstructionProgress::all();
        $data = [];
        foreach ($construction_progress_data as $construction_progress_value) {
            $construction_progress_gallery = $construction_progress_value->construction_progress_gallery('construction_progress_id')->get();
            $construction_progress_date = $construction_progress_value;
            array_push($data, compact('construction_progress_date', 'construction_progress_gallery'));
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
        $construction_progress = new ConstructionProgress();
        $construction_progress->year = $request['year'];
        $construction_progress->month = $request['month'];
        $construction_progress->day = $request['day'];
        $construction_progress->residential_complex_id = $request['residential_complex_id'];
        $construction_progress->save();
        return $construction_progress;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $construction_progress = ConstructionProgress::find($id);
        return $construction_progress;
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
        $construction_progress = ConstructionProgress::find($id);
        $construction_progress->year = $request['year'];
        $construction_progress->month = $request['month'];
        $construction_progress->day = $request['day'];
        $construction_progress->residential_complex_id = $request['residential_complex_id'];
        $construction_progress->save();
        return $construction_progress;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $construction_progress = ConstructionProgress::find($id);

        if (false != $construction_progress) {
            $construction_progress->delete();
            return "This Date was deleted";
        } else {
            return "This Image was deleted erlier";
        }
    }
}
