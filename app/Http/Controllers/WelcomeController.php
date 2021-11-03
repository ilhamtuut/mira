<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $data = News::inRandomOrder()->limit(6)->get();
    	return view('welcome', compact('data'));
    }
    
    public function news(Request $request)
    {
        $data = News::orderBy('id','desc')->paginate(10);
    	return view('news', compact('data'));
    }

    public function newsDetail(Request $request,$slug)
    {
        $random = News::inRandomOrder()->limit(6)->get();
        $data = News::where('slug',$slug)->first();
    	return view('news-detail', compact('data','random'));
    }
    
    public function faq(Request $request)
    {
        return view('faq');
    }
}
