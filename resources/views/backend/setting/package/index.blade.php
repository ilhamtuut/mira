@extends('layouts.backend',['active'=>'roi','page'=>'setting'])

@section('page-title')
Plan
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
                      <th class="text-right">Percent</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if($data->count()>0)
                    @foreach ($data as $key => $h)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$h->name}} (<i class="fas fa-euro-sign icon-sm"></i> {{number_format($h->amount)}})</td>
                        <td class="text-right">{{$h->percent * 100}}%</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light-primary call_modal" data-id="{{$h->id}}" data-value="{{$h->percent*100}}" data-desc="{{$h->name}}" data-toggle="modal" data-target="#responsive-modal" type="button">Update</button>
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

<div class="modal fade" id="responsive-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="title-modal"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('setting.updatePackage') }}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                      <label class="col-form-label">Percent</label>
                      <input id="value" type="text" name="percent" class="form-control" placeholder="Percent">
                      <input id="id" type="text" name="id" class="form-control hidden">
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Security Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Security Password">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-light-success">Submit</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Cancel</button>
              </div>
          </form>
      </div>
  </div>
</div>
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

