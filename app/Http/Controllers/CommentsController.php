<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();

        $comment->name = $request['name'];
        $comment->email = $request['email'];
        $comment->surname = $request['surname'];
        $comment->rating = $request['rating'];
        $comment->text = $request['text'];
        $comment->residential_complex_id = $request['residential_complex_id'];
        $comment->developer_id = $request['developer_id'];

        $comment->save();
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return $comment;
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
        $comment = Comment::find($id);

        $comment->name = $request['name'];
        $comment->email = $request['email'];
        $comment->surname = $request['surname'];
        $comment->rating = $request['rating'];
        $comment->text = $request['text'];
        $comment->residential_complex_id = $request['residential_complex_id'];
        $comment->developer_id = $request['developer_id'];

        $comment->save();
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (false != $comment) {
            $comment->delete();
            return "This $comment->name was deleted";
        } else {
            return "This Comment was deleted erlier";
        }
    }
}
