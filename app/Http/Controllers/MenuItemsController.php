<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_items = MenuItem::all();
        return $menu_items;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu_item = new MenuItem();

        $menu_item->menu_id = $request['menu_id'];
        $menu_item->name = $request['name'];
        $menu_item->roomines = $request['roomines'];
        $menu_item->cost = $request['cost'];
        $menu_item->quadrature = $request['quadrature'];

        $menu_item->save();
        return $menu_item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_item = MenuItem::find($id);
        return $menu_item;
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
        $menu_item = MenuItem::find($id);

        $menu_item->menu_id = $request['menu_id'];
        $menu_item->name = $request['name'];
        $menu_item->roomines = $request['roomines'];
        $menu_item->cost = $request['cost'];
        $menu_item->quadrature = $request['quadrature'];

        $menu_item->save();
        return $menu_item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu_item = MenuItem::find($id);
        if (false != $menu_item) {
            $menu_item->delete();
            return "This Menu Item was deleted";
        } else {
            return "This Menu Item was deleted erlier";
        }
    }
}
