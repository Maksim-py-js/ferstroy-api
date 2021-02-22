<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $data = [];
        foreach ($menus as $menu_value) {
            $menu_items = $menu_value->menu_items('menu_id')->get();

            $menu = $menu_value;

            array_push($data, compact(
                'menu',
                'menu_items'
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
        $menu = new Menu();

        $menu->header_id = $request['header_id'];
        $menu->footer_id = $request['footer_id'];
        $menu->title = $request['title'];

        $menu->save();
        return $menu;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_value = Menu::find($id);
        $data = [];
        $menu_items = $menu_value->menu_items('menu_id')->get();

        $menu = $menu_value;

        array_push($data, compact(
            'menu',
            'menu_items'
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
        $menu = Menu::find($id);

        $menu->header_id = $request['header_id'];
        $menu->footer_id = $request['footer_id'];
        $menu->title = $request['title'];

        $menu->save();
        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (false != $menu) {
            $menu->delete();
            return "This Menu was deleted";
        } else {
            return "This Menu was deleted erlier";
        }
    }
}
