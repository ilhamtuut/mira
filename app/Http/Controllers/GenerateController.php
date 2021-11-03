<?php

namespace App\Http\Controllers;

use Artisan;
use App\LogGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class GenerateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user-online');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     	
	public function viewGenerateBonus(Request $request)
	{
		return view('backend.generate.generate');
	}

    public function log(Request $request)
    {   
        $date = date('Y-m-d');
        if($request->date){
            $date = date('Y-m-d',strtotime($request->date));
        }
        $data = LogGenerate::whereDate('created_at',$date)->orderBy('id','desc')->paginate(20);
        return view('backend.generate.log',compact('data'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function bonus_pasif(Request $request)
    {
        Artisan::call('generate:bonus_pasif');
    }

    public function bonus_weekly(Request $request)
    {
        Artisan::call('generate:weekly');
    }
}
