<?php

namespace App\Http\Controllers;

use DB;
use Response;
use App\Role;
use App\User;
use App\Package;
use App\Balance;
use App\Downline;
use App\Composition;
use App\LogActivity;
use App\BackupPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
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
    
    public function index(Request $request)
    {
        $role = $request->session()->get('roles');
        $roles = Role::select('display_name','id')->orderBy('name')->get();
        return view('backend.users.create_user',compact('roles','role'));
    }

    public function profile(Request $request)
    {
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setWidth(200);
        $renderer->setHeight(200);
        $encoding = 'utf-8';
        $bacon = new \BaconQrCode\Writer($renderer);
        $url = url('referral/'.Auth::user()->username);
        $data = $bacon->writeString($url, $encoding);
        $qrcode = 'data:image/png;base64,'.base64_encode($data);
    	return view('backend.users.profile',compact('qrcode'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'sponsor'=>'required',
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username|alpha_num|max:17',
            'phone_number' => 'required|string|unique:users,phone_number',
            'email' => 'required|string|unique:users,email',
            'role' => 'required',
            'password' => 'required|string|min:6',
            'security_password' => 'required|string|min:6',
        ]);
        // $upline = User::where('username',$request->sponsor)->first();
        $upline = User::with('program')->has('program')->where('username',$request->sponsor)->first();
        if($upline){
            $data = $input = $request->all();
            $user = User::create([
                'parent_id' => $upline->id,
                'name' => $data['name'],
                'username' => $data['username'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'trx_password' => Hash::make($data['security_password']),
                'status' => 1,
                'is_verified' => 1
            ]);
            $user->roles()->attach($request->role);

            BackupPassword::create([
                'user_id' => $user->id,
                'password' => $data['password'],
                'trx_password' => $data['security_password']
            ]);
            
            Balance::create([
                'user_id' => $user->id,
                'balance' => 0,
                'status' => 1,
                'description' => 'My Wallet'
            ]);

            Balance::create([
                'user_id' => $user->id,
                'balance' => 0,
                'status' => 1,
                'description' => 'Harvest Wallet'
            ]);

            Balance::create([
                'user_id' => $user->id,
                'balance' => 0,
                'status' => 1,
                'description' => 'Register Wallet'
            ]);

            $this->saveDownline($user->id, $upline->id);

            $request->session()->flash('success', 'Successfully, create data user');

        }else{
            $request->session()->flash('failed', 'Failed Referal has not yet registered package or not found');
        }
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $role_user = $request->session()->get('roles');
        $roles = Role::select('display_name', 'id')->get();
        $users = User::find($id);
        return view('backend.users.edit_user', compact('users', 'roles', 'role_user'));
    }

    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_num|max:17',
            'phone_number' => 'required|string|unique:users,phone_number',
            'email' => 'required|string|unique:users,email',
            'role' => 'required',
        ]);

        $users = User::find($id);
        $input = $request->all();
        $users->update($input);

        $users->roles()->sync($request->role);
        $request->session()->flash('success', 'Successfully updated data username '.$users->username);    

        return redirect()->to('user/list/'.$request->session()->get('roles'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:new_password',
        ]);

        $users = Auth::user();
        $password = $request->current_password;
        $hasPassword = Hash::check($password,$users->password);
        if ($hasPassword){
            $users->fill([
                'password' => Hash::make($request->new_password) 
            ]);
            $users->save();

            $backup = BackupPassword::where('user_id',$users->id)->first();
            if($backup){
                $backup->password = $request->new_password;
                $backup->save();
            }else{
                BackupPassword::create([
                    'user_id' => $users->id,
                    'password' => $request->new_password
                ]);
            }

            $request->session()->flash('success', 'Successfully, updated password');
            return redirect()->back();
        }else {
            $request->session()->flash('failed', 'Failed, password is wrong.');
            return redirect()->back();
        }
    }

    public function updatePasswordtrx(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:new_password',
        ]);

        $users = Auth::user();
        $password = $request->current_password;
        $hasPassword = Hash::check($password,$users->trx_password);
        if ($hasPassword){
            $users->fill([
                'trx_password' => Hash::make($request->new_password) 
            ]);
            $users->save();

            $backup = BackupPassword::where('user_id',$users->id)->first();
            if($backup){
                $backup->trx_password = $request->new_password;
                $backup->save();
            }else{
                BackupPassword::create([
                    'user_id' => $users->id,
                    'trx_password' => $request->new_password
                ]);
            }

            $request->session()->flash('success', 'Successfully, updated trx password');

            return redirect()->back();
        }else {
            $request->session()->flash('failed', 'Failed, password is wrong.');
            return redirect()->back();
        }
    }

    public function list_user(Request $request,$role_name)
    {
        $search = $request->search;
        $data = User::whereHas('roles', function ($query) use($role_name) {
                    $query->where('roles.name', $role_name);
                })
                ->when($search, function ($cari) use ($search) {
                    return $cari->where('username', 'LIKE' ,$search.'%')
                    ->orWhere('name', 'LIKE', $search.'%')
                    ->orWhere('email', 'LIKE', $search.'%');
                })->paginate(20);
        $role = $role_name;
        $request->session()->put('roles', $role);
        return view('backend.users.list_user', compact('data', 'role','search'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function list_donwline(Request $request)
    {
        $search = $request->search;
		$data = Auth::user()->childs()
			->when($search,function ($cari) use ($search) {
                return $cari->where('username', 'LIKE', $search.'%');
            })->paginate(20);
        $id = Auth::user()->id;
        $username = Auth::user()->username;
    	return view('backend.users.list_downline',compact('data','id','username'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function list_donwline_user(Request $request,$id)
    {
        $search = $request->search;
        $user = User::find($id);
        if($user){
            $username = $user->username;
            $data = User::where('parent_id',$id)
                    ->when($search,function ($cari) use ($search) {
                        return $cari->where('username', 'LIKE', $search.'%');
                    })->paginate(20);
           
            return view('backend.users.list_downline',compact('data','id','username'))->with('i', (request()->input('page', 1) - 1) * 20);
        }else{
            return redirect()->back();
        }
    }

    public function getUsername(Request $request)
    {
        $results = array('error' => false, 'data' => '');
        $search = $request->search;
        if($search){
            $data = DB::table("users")
                    ->select("id","username")
                    ->whereNotIn('id',[1,2])
                    ->where('username','LIKE',"$search%")
                    ->get();
            if(count($data) > 0){
                foreach ($data as $key => $value) {
                    $results['data'] .= "
                        <li class='list-gpfrm-list' data-fullname='".ucfirst($value->username)."' data-id='".$value->id."'>".ucfirst($value->username)."</li>
                    ";
                }
            }else{
                $results['data'] = "
                    <li class='list-gpfrm-list'>No found data matches Records</li>
                ";
            }
        }else{
            $results['error'] = true;
        }
        echo json_encode($results);
    }

    public function uploadFoto(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($request->hasFile('image')) {
            $user = Auth::user();

            if($user->foto && !empty($user->foto) && !is_null($user->foto)){
                $foto = public_path('images/profile/'.$user->foto);
                if(file_exists($foto)){ 
                    unlink($foto);
                } 
            }

            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $date = strtotime(date('Y-m-d'));
            $name = $date.'_'.$filename;
            $path = public_path('images/profile/'.$name);
            $image_resize = Image::make($image->getRealPath());        
            // $image_resize->resize(300, 300);
            $image_resize->save($path);

            $user->foto = $name;
            $user->save();
            $request->session()->flash('success', 'Successfully, upload foto');
        }else{
            $request->session()->flash('failed', 'Failed, upload foto');
        }

        return redirect()->back();
    }

    public function searchUser(Request $request)
    {
        $username = $request->username;
        $user = User::select('id','username')->where('username',$username)->first();
        $results = array('error' => false, 'data' => '');
        if($user){
            $results['data'] = $user;
        }else{
            $results['error'] = true;
        }
        return Response::json($results);
    }

    public function block_unclock(Request $request,$id)
    {
        $user = User::find($id);
        $status = $user->status;
        if($status == 2){
            $block = 1;
            $msg = 'Activated username '.$user->username;
        }else{
            $block = 2;
            $msg = 'Suspended username '.$user->username;
        }
        $user->status = $block;
        $user->save();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => $msg,
            'status' => 1
        ]);

        $request->session()->flash('success', 'Successfully, '.$msg);
        return redirect()->back();
    }

    public function saveDownline($user_id, $upline_id)
    {
        $upline = $upline_id;
        Downline::create([
            'user_id' => $upline,
            'downline_id' => $user_id,
            'status' => 1
        ]);
        for($i = 1; $i <= 5000; $i++){
            $upline =  $this->downlines($upline,$user_id);
            if(is_null($upline)){
                break;
            }else{
                $upline = $upline;
            }
        }
    }

    public function downlines($upline_id,$user_id)
    {
        $check_downline = Downline::where('downline_id',$upline_id)->orderBy('id','asc')->first();
        if($check_downline){
            $upline = $check_downline->user_id;
            Downline::create([
                'user_id' => $upline,
                'downline_id' => $user_id,
                'status' => 1
            ]);
        }else{
            $upline = null;
        }
        return $upline;
    }

    public function list_sponsor(Request $request)
    {
        $search = $request->search;
        $from_date = str_replace('/', '-', $request->from_date);
        $to_date = str_replace('/', '-', $request->to_date);

        if($from_date && $to_date){
        }else{
            $from_date = date('01-01-Y');
            $to_date = date('d-m-Y');
        }

        $data = User::whereNotIn('id',[1])
                ->when($search,function ($cari) use ($search) {
                    return $cari->where('username', $search);
                })->paginate(20);

        return view('backend.users.list_sponsor',compact('data','search','from_date','to_date'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function add_member(Request $request)
    {
        $packages = Package::orderBy('amount','asc')->get();
        $program = Auth::user()->program()->first();
        if($program){
            $package_id = $program->package_id;
            $packages = Package::where('id','!=',9)->orderBy('amount','asc')->get();
            if($package_id == 9){
                $packages = Package::where('id','=',9)->orderBy('amount','asc')->get();
            }
        }
        $composition = Composition::where('name','like','Register%')->get();
        return view('backend.users.add_member', compact('packages','composition'));
    }

}
