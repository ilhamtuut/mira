@extends('layouts.backend',['active'=>'index','page'=>'users'])

@section('page-title')
Create User
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
    <div class="card-body">
        <form class="form-horizontal" action="{{route('user.create')}}" method="POST">
            {{ csrf_field() }}        
            <div class="form-body">
                <h4 class="card-title"><i class="fa fa-pencil"></i> Form Input</h4>
                <hr class="m-t-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Sponsor</label>
                                <div class="col-md-9">
                                    <input id="sponsor_user" type="text" name="sponsor" class="form-control {{ $errors->has('sponsor') ? ' is-invalid' : '' }}" placeholder="Sponsor">
                                    <ul class="list-gpfrm" id="hdTuto_search"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Username</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Phone Number</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3">Role</label>
                                <div class="col-md-9">
                                    <select name="role" class="form-control select2 {{ $errors->has('role') ? ' is-invalid' : '' }}" style="width: 100%;height: 36px;">
                                        <option value="">Choose</option>
                                        @foreach ($roles as $role)
                                            @if(Auth::user()->hasRole('admin') && $role->id == 1 || $role->id == 4)
                                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                                            @elseif(Auth::user()->hasRole('super_admin'))
                                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3"> Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-md-3"> Security Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="security_password" class="form-control {{ $errors->has('security_password') ? ' is-invalid' : '' }}" placeholder="Security Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-light-primary w-100"> <i class="fa fa-pencil"></i> Save</button>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    #hdTuto_search{
        display: none;
        padding-inline-start: 10px;
    }
    .list-gpfrm-list a{
        text-decoration: none !important;
    }
    .list-gpfrm li{
        color: #fff;
        cursor: pointer;
        padding: 10px;
    }
    .list-gpfrm{
        list-style-type: none;
        background: #3699FF;
    }
    .list-gpfrm li:hover{
        color: #fff;
        background-color: #3699FF;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#sponsor_user').keyup(function(e){
            e.preventDefault();
            if(this.value == ''){
                $('#hdTuto_search').hide();
            }else{
                $.ajax({
                  type: 'GET',
                  url: '{{ route('user.get_user') }}',
                  data: {search : this.value},
                  dataType: 'json',
                  success: function(response){
                    if(response.error){
                    }else{
                      $('#hdTuto_search').show().html(response.data);
                    }
                  }
                });
            }
        });

        $(document).on('click', '.list-gpfrm-list', function(e){
            e.preventDefault();
            $('#hdTuto_search').hide();
            var fullname = $(this).data('fullname');
            var id = $(this).data('id');
            $('#sponsor_user').val(fullname);
        });
    });
</script>
@endsection
