<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsContentRequest;
use App\Models\NewsContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsContents = NewsContent::paginate(10);
        return view('admin.news.list', compact('newsContents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsContentRequest $request)
    {
        if(isset($request->img_src)){
            $img_name = Str::slug($request->title).'.png';
            $request->img_src->move(public_path('images'), $img_name);
            NewsContent::create(array_merge($request->post(), ['img_src' => $img_name]));
        }else{
            NewsContent::create($request->post());
        }

        return redirect()->route('news-contents.index')->withSucces('News added.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
