<?php

namespace App\Http\Controllers;

use App\Package;
use App\Setting;
use App\LogActivity;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
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
    public function index()
    {
        $data = Setting::orderBy('name')->paginate(20);
        return view('backend.setting.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'amount'=>'required|numeric',
            'password'=>'required'
        ]);

        $hasPassword = Hash::check($request->password, Auth::user()->trx_password);
        if($hasPassword){
            $run = true;
            $update = Setting::find($request->id);
            if($update->currency == "%"){
                $amount = $request->amount/100;
                $ket = "Change ".$update->name." value ".($update->value*100)." to ".$request->amount;
            }else{
                $amount = $request->amount;
                $ket = "Change ".$update->name." value ".$update->value." to ".$amount;
            }

            $update->value = $amount;
            $update->save();
            
            LogActivity::create([
                'user_id' => Auth::user()->id,
                'activity' => $ket,
                'status' => 1
            ]);
            $request->session()->flash('success', 'Successfully, '.$ket); 
            
        }else{
            $request->session()->flash('failed', 'Failed, Password is wrong');
        }
        return redirect()->back();
    }

    public function package(Request $request)
    {
        $data = Package::paginate(20);
        return view('backend.setting.package.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function updatePackage(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'percent'=>'required|numeric',
            'password'=>'required'
        ]);

        $hasPassword = Hash::check($request->password, Auth::user()->trx_password);
        if($hasPassword){
            $run = true;
            $update = Package::find($request->id);
            $percent = $request->percent/100;
            $ket = "Change ".$update->name." percent ".($update->percent*100)." to ".$request->percent;
            $update->percent = $percent;
            $update->save();
            LogActivity::create([
                'user_id' => Auth::user()->id,
                'activity' => $ket,
                'status' => 1
            ]);
            $request->session()->flash('success', 'Successfully, '.$ket); 
            
        }else{
            $request->session()->flash('failed', 'Failed, Password is wrong');
        }
        return redirect()->back();
    }
}
