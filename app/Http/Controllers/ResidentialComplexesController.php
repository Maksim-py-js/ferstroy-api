<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentialComplex;

class ResidentialComplexesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentialcomplexes = ResidentialComplex::all();
        return $residentialcomplexes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $residentialcomplex = new ResidentialComplex();
        $residentialcomplex->name = $request['name'];
        $residentialcomplex->description = $request['description'];
        $residentialcomplex->image = $request['image'];
        $residentialcomplex->save();
        return $residentialcomplex;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
