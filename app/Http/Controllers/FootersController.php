<?php

namespace App\Http\Controllers;
use App\Models\Footer;

use Illuminate\Http\Request;

class FootersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::all();
        return $footers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $footer = new Footer();

        $footer->about_title = $request['about_title'];
        $footer->about_text = $request['about_text'];

        $footer->socials_title = $request['socials_title'];

        $footer->instagram_link = $request['instagram_link'];
        $footer->vk_link = $request['vk_link'];
        $footer->facebook_link = $request['facebook_link'];
        $footer->youtube_link = $request['youtube_link'];
        $footer->twitter_link = $request['twitter_link'];

        $footer->address_title = $request['address_title'];
        $footer->address = $request['address'];

        $footer->number_title = $request['number_title'];
        $footer->number = $request['number'];

        $footer->save();
        return $footer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = Footer::find($id);
        return $footer;
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
        $footer = Footer::find($id);

        $footer->about_title = $request['about_title'];
        $footer->about_text = $request['about_text'];

        $footer->socials_title = $request['socials_title'];

        $footer->instagram_link = $request['instagram_link'];
        $footer->vk_link = $request['vk_link'];
        $footer->facebook_link = $request['facebook_link'];
        $footer->youtube_link = $request['youtube_link'];
        $footer->twitter_link = $request['twitter_link'];

        $footer->address_title = $request['address_title'];
        $footer->address = $request['address'];

        $footer->number_title = $request['number_title'];
        $footer->number = $request['number'];

        $footer->save();
        return $footer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::find($id);
        if (false != $footer) {
            $footer->delete();
            return "This Footer was deleted";
        } else {
            return "This Footer was deleted erlier";
        }
    }
}
