<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\NewsContent;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commenter_id = User::where('remember_token', $request->remember_token)->first()->id ?? abort('404');
        $news_id = $request->news_id;
        $comment = Comment::create(['commenter_id' => $commenter_id, 'news_id' => $news_id, 'content' => $request->content]);

        return redirect()->back()->withSucces('Your comment has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = NewsContent::find($id)->comments ?? abort('404');
        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Comment::where('id', $id)->update(['status' => $request->status]);
        return redirect()->back()->withChanged('Status Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id', $id)->delete() ?? abort('404');
        return redirect()->back()->withDeleted('Comment Deleted');
    }
}
