<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsContentRequest;
use App\Models\NewsContent;
use App\Models\Comment;
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
        $newsContents = NewsContent::orderBy('updated_at', 'DESC');

        if(request()->get('title')){
            $newsContents = $newsContents->where('title','LIKE','%'. request()->get('title') .'%');
        }
        if(request()->get('status')){
           $newsContents = $newsContents->where('status','LIKE','%'.request()->get('status').'%');
        }
        $newsContents = $newsContents->paginate(5);
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
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsContent = NewsContent::find($id) ?? abort('404');
        return view('admin.news.edit', compact('newsContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsContentRequest $request, $id)
    {
        NewsContent::find($id) ?? abort('404');

        $requestAll = $request->except(['_method','_token']);
        if(isset($request->img_src)){
            $img_name = Str::slug($request->title).'.png';
            $request->img_src->move(public_path('images'), $img_name);
            NewsContent::where('id',$id)->update(array_merge($requestAll,['img_src' => $img_name]));
        }else{
            NewsContent::where('id',$id)->update(array_merge($requestAll));
        }
        return redirect()->route('news-contents.index')->withSucces(substr($request->title,0,50). '... ' . 'news updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsContent = NewsContent::find($id) ?? abort('404');
        $newsContent->delete();
        return redirect()->route('news-contents.index')->withSucces('News Deleted.');
    }
}
