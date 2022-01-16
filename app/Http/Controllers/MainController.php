<?php

namespace App\Http\Controllers;

use App\Models\NewsContent;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $newsContents = NewsContent::where('status','publish')->get();
        return view('welcome', compact('newsContents'));
    }
}
