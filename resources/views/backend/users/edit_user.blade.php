@extends('layouts.backend')

@section('page-title')
Edit User
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
    <div class="card-body">
        <form class="form-horizontal" action="{{route('user.updateData',$users->id)}}" method="POST">
            {{ csrf_field() }}        
            <div class="form-body">
                <h4 class="card-title"><i class="fa fa-edit"></i> Form Edit</h4>
                <hr class="m-t-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Username</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" readonly placeholder="Username" value="{{$users->username}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{$users->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{$users->email}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Phone Number</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="Phone Number" value="{{$users->phone_number}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Role</label>
                                <div class="col-md-9">
                                    <select name="role" class="form-control select2" style="width: 100%;height: 36px;">
                                        <option>Choose</option>
                                        @foreach ($roles as $role)
                                            @if(Auth::user()->hasRole('admin') && $role->id == 1 || $role->id == 4)
                                                <option value="{{$role->id}}" 
                                                    @foreach ($users->roles as $r)
                                                        @if ($role->id == $r->id)
                                                            selected 
                                                        @endif
                                                    @endforeach
                                                    >{{$role->display_name}}</option>
                                            @elseif(Auth::user()->hasRole('super_admin'))
                                                <option value="{{$role->id}}" 
                                                    @foreach ($users->roles as $r)
                                                        @if ($role->id == $r->id)
                                                            selected 
                                                        @endif
                                                    @endforeach
                                                    >{{$role->display_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-light-success"> <i class="fa fa-pencil"></i> Save Changes</button>
                        <a href="{{ route('user.list_user',$role_user) }}" class="btn btn-light-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
