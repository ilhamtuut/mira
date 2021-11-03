@extends('layouts.backend',['active'=>'setting','page'=>'setting'])

@section('page-title')
Settings
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
    <div class="card-body">
        <!--begin: Datatable-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-left text-uppercase">
                      <th width="3%">#</th>
                      <th>Name</th>
                      <th class="text-right">Value</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if($data->count()>0)
                    @foreach ($data as $key => $h)
                      <tr>
                          <td>{{++$key}}</td>
                          <td>{{$h->name}}</td>
                          <td class="text-right">
                              @if($h->currency == '%')
                                  {{$h->value * 100}}{{$h->currency}}
                              @else
                                  {{number_format($h->value,2)}} {{$h->currency}}
                              @endif
                          </td>
                          <td class="text-center">
                              <button class="btn btn-sm btn-light-primary call_modal" data-id="{{$h->id}}" data-value="{{($h->currency == '%')? $h->value*100 : $h->value}}" data-desc="{{$h->name}}" data-toggle="modal" data-target="#responsive-modal" type="button">Update</button>
                          </td>
                      </tr>
                    @endforeach
                  @else
                      <tr>
                        <td colspan="4" class="text-center">No data available in table</td>
                      </tr>
                  @endif
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
        <!--end: Datatable-->
    </div>
</div>
@include('backend.setting.modal_price')
@endsection
@section('script')
<script type="text/javascript">
    $(function(){
        $('.call_modal').on('click',function(){
            var title = $(this).data('desc');
            $('#id').val($(this).data('id'));
            $('#value').val($(this).data('value'));
            $('#title-modal').html('Update ' + title.replace(/_/g,' '));
        });
    });
</script>
@endsection

