<?php

namespace App\Http\Controllers;

use Response;
use App\User;
use App\BonusPasif;
use App\BonusActive;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class BonusController extends Controller
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

    public function bonus_profit(Request $request)
    {
        $date = '';
        if($request->date){
            $date = date('Y-m-d',strtotime(str_replace('/', '-', $request->date)));
        }
        $data = Auth::user()
                ->bonus_pasif()
                ->when($date,function ($cari) use ($date) {
                    return $cari->whereDate('created_at', $date);
                })
                ->orderBy('created_at','desc')
                ->paginate(20);
        $total = Auth::user()
                ->bonus_pasif()
                ->when($date,function ($cari) use ($date) {
                    return $cari->whereDate('created_at', $date);
                })
                ->sum('bonus');

        return view('backend.bonus.list_bonus_profit',compact('data','date','total'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function bonus_active(Request $request,$type)
    {
        $date = '';
        if($request->date){
            $date = date('Y-m-d',strtotime(str_replace('/', '-', $request->date)));
        }
        if($type == 'sponsor'){
            $active = 'bonus_sponsor';
        }elseif($type == 'weekly'){
            $active = 'weekly';
        }elseif($type == 'daily'){
            $active = 'daily';
        }elseif($type == 'reward'){
            $active = 'reward';
        }

        if($type == 'daily'){
            $data = Auth::user()
                    ->bonus_pasif()
                    ->when($date,function ($cari) use ($date) {
                        return $cari->whereDate('created_at', $date);
                    })
                    ->orderBy('created_at','desc')
                    ->paginate(20);
            $total = Auth::user()
                    ->bonus_pasif()
                    ->when($date,function ($cari) use ($date) {
                        return $cari->whereDate('created_at', $date);
                    })
                    ->sum('bonus');
            return view('backend.bonus.list_bonus_profit',compact('data','date','total'))->with('i', (request()->input('page', 1) - 1) * 20);
        }else{
            $data = Auth::user()
                    ->bonus_active()
                    ->where('description','like','%'.$type.'%')
                    ->when($date,function ($cari) use ($date) {
                        return $cari->whereDate('created_at', $date);
                    })
                    ->orderBy('created_at','desc')
                    ->paginate(20);
            $total = Auth::user()
                    ->bonus_active()
                    ->where('description','like','%'.$type.'%')
                    ->when($date,function ($cari) use ($date) {
                        return $cari->whereDate('created_at', $date);
                    })
                    ->sum('bonus');
            return view('backend.bonus.list_bonus_active',compact('data','date','total','active','type'))->with('i', (request()->input('page', 1) - 1) * 20);
        }
    }

    public function list_bonus_active(Request $request,$desc)
    {
        $search = $request->search;
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);

        if($from_date && $to_date){
            $from = date('Y-m-d',strtotime($from_date));
            $to = date('Y-m-d',strtotime($to_date));
        }else{
            $from = date('Y-m-d',strtotime('01/01/2018'));
            $to = date('Y-m-d');
            $from_date = date('01/01/Y');
            $to_date = date('d/m/Y');
        }

        $active = '';
        $ket = '';
        $bonus ='App\BonusActive';
        if($desc == 'sponsor'){
            $ket = '%sponsor%';
            $active = 'list_sponsor';
        }elseif($desc == 'daily'){
            $ket = '%daily%';
            $bonus ='App\BonusPasif';
            $active = 'list_daily';
        }elseif($desc == 'weekly'){
            $ket = '%weekly%';
            $active = 'list_weekly';
        }elseif($desc == 'reward'){
            $ket = '%reward%';
            $active = 'list_reward';
        }

        if($ket){
            if($search){
                $user = User::select('id')->where('username',$search)->first();
                if($user){
                    $data = $bonus::where('user_id',$user->id)
                        ->where('description','like',$ket)
                        ->whereDate('created_at','>=',$from)
                        ->whereDate('created_at','<=',$to)
                        ->orderBy('created_at','desc')
                        ->paginate(20);

                    $total = $bonus::where('user_id',$user->id)
                        ->where('description','like',$ket)
                        ->whereDate('created_at','>=',$from)
                        ->whereDate('created_at','<=',$to)
                        ->sum('bonus');      
                }else{
                    $data = $bonus::where('status',1)
                    ->whereYear('created_at','2017')
                    ->orderBy('created_at','desc')
                    ->paginate(20);
                    $total = 0;
                }  
            }else{
                $data = $bonus::where('description','like',$ket)
                    ->whereDate('created_at','>=',$from)
                    ->whereDate('created_at','<=',$to)
                    ->orderBy('created_at','desc')
                    ->paginate(20);

                $total = $bonus::where('description','like',$ket)
                    ->whereDate('created_at','>=',$from)
                    ->whereDate('created_at','<=',$to)
                    ->sum('bonus');
            }

            return view('backend.bonus.history_bonus_active',compact('data','search','from_date','to_date','total','desc','active'))->with('i', (request()->input('page', 1) - 1) * 20);
        }else{
            return redirect()->route('home');
        }
    }
}
