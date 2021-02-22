<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advantage;

class AdvantagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $advantages = Advantage::all();
//        return $advantages;

        $advantages = Advantage::all();
        $data = [];
        foreach ($advantages as $advantage_value) {
            $advantages_icons = $advantage_value->advantages_icons()->get();
            $advantage = $advantage_value;
            foreach ($advantages_icons as $advantage_icon) {
                $icon_id = Advantage::find($advantage_icon->icon_id);
            }
            array_push($data, compact('advantage', 'advantages_icons'));
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
        $advantage = new Advantage();

        $advantage->title = $request['title'];
        $advantage->count = $request['count'];
        $advantage->text = $request['text'];
        $advantage->icon_id = $request['icon_id'];
        $advantage->residential_complex_id = $request['residential_complex_id'];
        $advantage->page_id = $request['page_id'];
        $advantage->developer_id = $request['developer_id'];

        $advantage->save();
        return $advantage;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advantage = Advantage::find($id);
        return $advantage;
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
        $advantage = Advantage::find($id);

        $advantage->title = $request['title'];
        $advantage->count = $request['count'];
        $advantage->text = $request['text'];
        $advantage->icon_id = $request['icon_id'];
        $advantage->residential_complex_id = $request['residential_complex_id'];
        $advantage->page_id = $request['page_id'];
        $advantage->developer_id = $request['developer_id'];

        $advantage->save();
        return $advantage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advantage = Advantage::find($id);
        if (false != $advantage) {
            $advantage->delete();
            return "This $advantage->title was deleted";
        } else {
            return "This Comment was deleted erlier";
        }
    }
}
