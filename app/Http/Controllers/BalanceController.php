<?php

namespace App\Http\Controllers;

use App\Balance;
use App\HistoryTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
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

    public function balance_user(Request $request)
    {
        $search = $request->search;
    	$wallet = $request->wallet;
    	$data = Balance::where('user_id','!=',1)
                ->when($wallet, function ($query) use ($wallet){
                    $query->where('description',$wallet);
                })
    			->whereHas('user', function ($query) use($search) {
                    $query->where('users.username','LIKE', $search.'%');
                })
                ->paginate(20);
        $total = Balance::where('user_id','!=',1)
                ->when($wallet, function ($query) use ($wallet){
                    $query->where('description',$wallet);
                })
                ->whereHas('user', function ($query) use($search) {
                    $query->where('users.username','LIKE', $search.'%');
                })
                ->sum('balance');

        return view('backend.wallet.balance', compact('data','total','search','wallet'))->with('i', (request()->input('page', 1) - 1) * 20);

    }

    public function balance_my(Request $request)
    {
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);
        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            // $from_date = '01/01/2018';
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $balance = Auth::user()->balance->where('description','My Wallet')->first();
        if($balance){
            $data = HistoryTransaction::where('balance_id',$balance->id)
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->orderBy('created_at','desc')
                ->paginate(20);
            $in = HistoryTransaction::where('balance_id',$balance->id)
                ->where('type','IN')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $out = HistoryTransaction::where('balance_id',$balance->id)
                ->where('type','OUT')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $a = number_format($in,8, '.', '');
            $b = number_format($out,8, '.', '');
            $total = $a - $b;
            $saldo = $balance->balance;
        }else{
            $data = HistoryTransaction::whereYear('created_at','2017')
                ->orderBy('created_at','desc')
                ->paginate(20);
            $total = 0;
            $saldo = 0;
        }
        $id = null;
        return view('backend.wallet.my_wallet', compact('data','total','from_date','to_date','id','saldo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function balance_register(Request $request)
    {
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);
        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            // $from_date = '01/01/2018';
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $balance = Auth::user()->balance->where('description','Register Wallet')->first();
        if($balance){
            $data = HistoryTransaction::where('balance_id',$balance->id)
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->orderBy('created_at','desc')
                ->paginate(20);
            $in = HistoryTransaction::where('balance_id',$balance->id)
                ->where('type','IN')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $out = HistoryTransaction::where('balance_id',$balance->id)
                ->where('type','OUT')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $a = number_format($in,8, '.', '');
            $b = number_format($out,8, '.', '');
            $total = $a - $b;
            $saldo = $balance->balance;
        }else{
            $data = HistoryTransaction::whereYear('created_at','2017')
                ->orderBy('created_at','desc')
                ->paginate(20);
            $total = 0;
            $saldo = 0;
        }
        $id = null;
        return view('backend.wallet.register_wallet', compact('data','total','from_date','to_date','id','saldo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function balance_harvest(Request $request)
    {
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);
        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            // $from_date = '01/01/2018';
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $balance = Auth::user()->balance->where('description','Harvest Wallet')->first();
        if($balance){
            $data = HistoryTransaction::where('balance_id',$balance->id)
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->orderBy('created_at','desc')
                ->paginate(20);
            $in = HistoryTransaction::where('balance_id',$balance->id)
                ->where('type','IN')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $out = HistoryTransaction::where('balance_id',$balance->id)
                ->where('type','OUT')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $a = number_format($in,8, '.', '');
            $b = number_format($out,8, '.', '');
            $total = $a - $b;
            $saldo = $balance->balance;
        }else{
            $data = HistoryTransaction::whereYear('created_at','2017')
                ->orderBy('created_at','desc')
                ->paginate(20);
            $total = 0;
            $saldo = 0;
        }
        $id = null;
        return view('backend.wallet.harvest_wallet', compact('data','total','from_date','to_date','id','saldo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function balance_my_member(Request $request,$id)
    {
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);
        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            // $from_date = '01/01/2018';
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $balance = Balance::where(['user_id'=>$id,'description'=>'My Wallet'])->first();
        if($balance){
            $data = HistoryTransaction::where('balance_id',$balance->id)
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->orderBy('created_at','desc')
                ->paginate(20);
            $in = HistoryTransaction::where('balance_id',$balance->id)->where('type','IN')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $out = HistoryTransaction::where('balance_id',$balance->id)->where('type','OUT')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $a = number_format($in,8, '.', '');
            $b = number_format($out,8, '.', '');
            $total = $a - $b;
            $saldo = $balance->balance;
        }else{
            $data = HistoryTransaction::whereYear('created_at','2017')
                ->orderBy('created_at','desc')
                ->paginate(20);
            $total = 0;
            $saldo = 0;
        }
        return view('backend.wallet.my_wallet', compact('data','total','from_date','to_date','id','saldo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function balance_register_member(Request $request,$id)
    {
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);
        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            // $from_date = '01/01/2018';
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $balance = Balance::where(['user_id'=>$id,'description'=>'Register Wallet'])->first();
        if($balance){
            $data = HistoryTransaction::where('balance_id',$balance->id)
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->orderBy('created_at','desc')
                ->paginate(20);
            $in = HistoryTransaction::where('balance_id',$balance->id)->where('type','IN')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $out = HistoryTransaction::where('balance_id',$balance->id)->where('type','OUT')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $a = number_format($in,8, '.', '');
            $b = number_format($out,8, '.', '');
            $total = $a - $b;
            $saldo = $balance->balance;
        }else{
            $data = HistoryTransaction::whereYear('created_at','2017')
                ->orderBy('created_at','desc')
                ->paginate(20);
            $total = 0;
            $saldo = 0;
        }
        return view('backend.wallet.register_wallet', compact('data','total','from_date','to_date','id','saldo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function balance_harvest_member(Request $request,$id)
    {
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);
        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            // $from_date = '01/01/2018';
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $balance = Balance::where(['user_id'=>$id,'description'=>'Harvest Wallet'])->first();
        if($balance){
            $data = HistoryTransaction::where('balance_id',$balance->id)
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->orderBy('created_at','desc')
                ->paginate(20);
            $in = HistoryTransaction::where('balance_id',$balance->id)->where('type','IN')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $out = HistoryTransaction::where('balance_id',$balance->id)->where('type','OUT')
                ->whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->sum('amount');
            $a = number_format($in,8, '.', '');
            $b = number_format($out,8, '.', '');
            $total = $a - $b;
            $saldo = $balance->balance;
        }else{
            $data = HistoryTransaction::whereYear('created_at','2017')
                ->orderBy('created_at','desc')
                ->paginate(20);
            $total = 0;
            $saldo = 0;
        }
        return view('backend.wallet.harvest_wallet', compact('data','total','from_date','to_date','id','saldo'))->with('i', (request()->input('page', 1) - 1) * 20);
    }     
}
