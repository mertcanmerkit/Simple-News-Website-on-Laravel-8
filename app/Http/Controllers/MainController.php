<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\NewsContent;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $newsContents = NewsContent::where('status', 'publish')->get();
        return view('welcome', compact('newsContents'));
    }

    public function newsDetail($id)
    {
        $newsContent = NewsContent::where('id', $id)->where('status', 'publish')->first() ?? abort('404');
        $comments = $newsContent->comments->where('status', 'publish');
        return view('content-page', compact(['newsContent','comments']));
    }
}
