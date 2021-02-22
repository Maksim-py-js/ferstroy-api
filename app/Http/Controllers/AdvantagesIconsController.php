<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvantagesIcon;
use Illuminate\Support\Facades\File;

class AdvantagesIconsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advantages_icons = AdvantagesIcon::all();
        return $advantages_icons;
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
            'icon' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $file = $request->file('icon');
        $name = date('dmyhis');
        $extension = $file->getClientOriginalExtension();
        $fullName = ($name . '.' . $extension);
        $file->move(public_path('images/advantages_icons'), $fullName);

        $advantages_icon = new AdvantagesIcon();
        $advantages_icon->icon = env("APP_URL", 'http://localhost').'/images/advantages_icons/' . $name . '.' . $extension;
        $advantages_icon->save();
        return $advantages_icon;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advantages_icon = AdvantagesIcon::find($id);
        return $advantages_icon;
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
        $advantages_icon = AdvantagesIcon::find($id);

        if ($request['icon']) {
            $advantages_icon->icon = env("APP_URL", 'http://localhost').'/images/advantages_icons/'.$request['icon'];
        }
        $advantages_icon->save();
        return $advantages_icon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advantages_icon = AdvantagesIcon::find($id);

        if (false != $advantages_icon) {

            $icon_value = explode('/', $advantages_icon->icon);
            ob_start();
            echo end ($icon_value);
            $icon_name = ob_get_clean();

            File::delete('images/advantages_icons/'.$icon_name);

            $advantages_icon->delete();
            return "This Icon was deleted";
        } else {
            return "This Icon was deleted erlier";
        }
    }
}
