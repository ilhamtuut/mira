<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\Staking;
use App\Setting;
use App\EarnDay;
use App\StakingEarn;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class EarnController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('user-online');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staking::get();
        $max = Setting::where('name','Maximum Total Staking')->first()->value;
        $total = StakingEarn::sum('amount');
        $rest = $max - $total;
        if($rest < 0){
            $rest = 0;
        }
        $percent = round(($total/$max) * 100,2);
        return view('backend.earn.index', compact('data','max','total','rest','percent'));
    }

    public function stacking(Request $request){
        $wallet = Auth::user()->wallet;
        $response = Curl::to('https://apilist.tronscan.org/api/account?address='.$wallet->address)
            ->asJson()
            ->get();
            // dd(count($response->tokens));

        if (count($response->tokens) > 1) {
        
         $saldo = $response->tokens[1]->balance / 1000000000000000000;
        }else{
            $saldo = 0;
        }

        if ($saldo < $request->amount) {
            return redirect()->back();
        }
        $stack = Staking::find($request->stack_id);

        // dd($request->stack_id);
        $date = date('Y-m-d');
        $data = new StakingEarn;
        $data->fill([
            'user_id' => Auth::User()->id,
            'staking_id' => $request->stack_id,
            'amount' => $request->amount,
            'earn' => $request->amount * $stack->annualized_yield,
            'status' => 1,
            'date_expired' =>  date('Y-m-d', strtotime($date. ' + '.$stack->duration.' days'))
        ]);

        $data->save();

        return redirect()->back();
    }

    public function stackPost(Request $request){
        // var_dump($request->staking_id); die();
        $date = date('Y-m-d');
        $stack = Staking::find($request->staking_id);

        // return response()->json([StakingEarn::find(4)]);

        $data = new StakingEarn;
        $data->fill([
            'user_id' => 1,
            'address' => $request->address,
            'staking_id' => $request->staking_id,
            'amount' => $request->amount / 1000000000000000000 ,
            'earn' => ($request->amount / 1000000000000000000) * $stack->annualized_yield,
            'status' => 1,
            'date_expired' =>  date('Y-m-d', strtotime($date. ' + '.$stack->duration.' days')),
            'txid' => $request->trx_id
        ]);

        $data->save();

        return response()->json(['data' => $data, 'success' => true]);
    }

    public function totalEarn(Request $request){
        $address = $request->address;
        $total = EarnDay::when($address, function ($query) use ($address){
            $query->whereHas('stakingEarn', function ($q) use ($address){
                $q->where('address',$address);
            });
        })->sum('earn');

        $remining = EarnDay::when($address, function ($query) use ($address){
            $query->whereHas('stakingEarn', function ($q) use ($address){
                $q->where('address',$address);
            });
        })->where('status',1)->sum('earn');

        return response()->json(['success' => true, 'total' => round($total,8), 'remining' => round($remining,8)]);
    }

    public function limitStake(Request $request){
        $max = Setting::where('name','Maximum Total Staking')->first()->value;
        $total = StakingEarn::sum('amount');
        $rest = $max - $total;
        if($rest < 0){
            $rest = 0;
        }
        $percent = round(($total/$max) * 100,2);
        $data = array(
            'max' => $max,
            'total' => $total,
            'rest' => $rest,
            'percent' => $percent,
        );
        return response()->json(['data' => $data, 'success' => true]);
    }
}
