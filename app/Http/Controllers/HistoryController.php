<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\StakingEarn;

class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = StakingEarn::with('stakings')->when($search, function ($query) use ($search){
                    $query->where('address', $search)
                            ->orWhere('txid', $search);
                })
                ->orderBy('id','desc')
                ->paginate(30);
        return view('backend.history.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 30);
    }
}
