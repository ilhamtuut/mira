@extends('layouts.backend',['active'=>$role,'page'=>'users'])

@section('page-title')
List {{ucfirst($role)}}
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
    <div class="card-body">
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-12 col-xl-12">
                    <div class="row align-items-center">
                        <div class="col-md-8 my-2 my-md-0"></div>
                        <div class="col-md-4 my-2 my-md-0">
                            <form action="{{ route('user.list_user',$role) }}" method="get" id="form-search">
                              <div class="input-group">
                                  <input name="search" type="text" class="form-control" placeholder="Search">
                                  <div class="input-group-append">
                                      <button class="btn btn-primary" type="submit"><i class="flaticon2-search-1 text-white"></i></button>
                                  </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-left text-uppercase">
                      <th width="3%">#</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if($data->count()>0)
                      @foreach ($data as $h)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>{{ucfirst($h->username)}}</td>
                              <td>{{ucfirst($h->name)}}</td>
                              <td>{{$h->email}}</td>
                              <td>{{$h->phone_number}}</td>
                              <td class="text-center">
                                  <a href="{{ route('user.edit', $h->id) }}" class="btn btn-sm btn-light-info">Edit</a>
                                  <a href="#" data-target="#bd-user-modal-lg" data-toggle="modal" class="btn btn-sm btn-light-primary call_modal_user" data-sponsor="{{($h->parent)? $h->parent->username: '-'}}" data-username="{{$h->username}}" data-name="{{$h->name}}" data-email="{{$h->email}}" data-phone_number="{{$h->phone_number}}" data-date="{{$h->created_at}}" data-active="{{number_format($h->balance->where('description','My Wallet')->first()->balance,2)}}" data-pasif="{{number_format($h->balance->where('description','Harvest Wallet')->first()->balance,2)}}" data-reg="{{number_format($h->balance->where('description','Register Wallet')->first()->balance,2)}}">Detail</a>
                                  <a href="{{ route('user.list_donwline_user', $h->id) }}" class="btn btn-sm btn-light-success">View Downline</a>
                                  <a href="{{ route('user.block_unclock', $h->id) }}" class="btn btn-sm btn-light-{{($h->status == 1 || $h->status == 0)?'danger':'success'}}">{{($h->status == 1 || $h->status == 0)?'Block':'Unblock'}}</a>
                              </td>
                          </tr>
                      @endforeach
                  @else
                      <tr>
                        <td colspan="6" class="text-center">No data available in table</td>
                      </tr>
                  @endif
                </tbody>
            </table>
            {!! $data->appends(['search'=>$search])->render() !!}
        </div>
        <!--end: Datatable-->
    </div>
</div>
@include('backend.users.modal_detail_user')
@endsection
@section('script')
<script type="text/javascript">
  function submit() {
    $("#form-search").submit();
  }

  $(function(){
    $('.call_modal_user').on('click',function(){
      $('#modal_user_sponsor').html($(this).data('sponsor'));
      $('#modal_user_username').html($(this).data('username'));
      $('#modal_user_name').html($(this).data('name'));
      $('#modal_user_email').html($(this).data('email'));
      $('#modal_user_date').html($(this).data('date'));
      $('#modal_user_active').html($(this).data('active'));
      $('#modal_user_pasif').html($(this).data('pasif'));
      $('#modal_user_reg').html($(this).data('reg'));
      $('#modal_user_phone_number').html($(this).data('phone_number'));
    });
  });
</script>
@endsection
