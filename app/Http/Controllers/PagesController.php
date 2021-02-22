<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Advantage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $data = [];
        foreach ($pages as $page) {

            $advantages = $page->advantages('page_id')->get();

            $page_advantages = [];
            foreach ($advantages as $advantage_value) {
                $advantage_icon = $advantage_value->advantages_icons()->get();
                $advantage = $advantage_value;
                foreach ($advantage_icon as $advantage_icon_value) {
                    $icon_id = Advantage::find($advantage_icon_value->icon_id);
                }
                array_push($page_advantages, compact('advantage', 'advantage_icon'));
            }


            $page_value = $page;
            array_push($data, compact(
                'page_value',
                'page_advantages'
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
        $page = new Page();

        $page->header_number = $request['header_number'];
        $page->header_search_button = $request['header_search_button'];
        $page->header_title = $request['header_title'];
        $page->header_residential_complex_name = $request['header_residential_complex_name'];
        $page->header_state_button = $request['header_state_button'];

        $page->bestsellers_title = $request['bestsellers_title'];
        $page->advantages_title = $request['advantages_title'];

        $page->main_page = $request['main_page'];
        $page->search_result = $request['search_result'];
        $page->object_page = $request['object_page'];
        $page->map_page = $request['map_page'];
        $page->developers_page = $request['developers_page'];
        $page->developer_page = $request['developer_page'];

        $page->save();
        return $page;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        $data = [];
        $advantages = $page->advantages('page_id')->get();

        $page_advantages = [];
        foreach ($advantages as $advantage_value) {
            $advantage_icon = $advantage_value->advantages_icons()->get();
            $advantage = $advantage_value;
            foreach ($advantage_icon as $advantage_icon_value) {
                $icon_id = Advantage::find($advantage_icon_value->icon_id);
            }
            array_push($page_advantages, compact('advantage', 'advantage_icon'));
        }


        $page_value = $page;
        array_push($data, compact(
            'page_value',
            'page_advantages'
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
        $page = Page::find($id);

        $page->header_number = $request['header_number'];
        $page->header_search_button = $request['header_search_button'];
        $page->header_title = $request['header_title'];
        $page->header_residential_complex_name = $request['header_residential_complex_name'];
        $page->header_state_button = $request['header_state_button'];

        $page->bestsellers_title = $request['bestsellers_title'];
        $page->advantages_title = $request['advantages_title'];

        $page->main_page = $request['main_page'];
        $page->search_result = $request['search_result'];
        $page->object_page = $request['object_page'];
        $page->map_page = $request['map_page'];
        $page->developers_page = $request['developers_page'];
        $page->developer_page = $request['developer_page'];

        $page->save();
        return $page;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if (false != $page) {
            $page->delete();
            return "This Page was deleted";
        } else {
            return "This Page was deleted erlier";
        }
    }
}
