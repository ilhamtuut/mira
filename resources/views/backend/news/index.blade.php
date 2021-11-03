@extends('layouts.backend',['active'=>'news','page'=>'news'])

@section('page-title')
News
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
    <div class="card-body">
        <!--begin: Datatable-->
        <a href="{{route('news.add')}}" class="btn btn-sm btn-light-primary" type="button"><i class="fa fa-plus"></i> Add News</a><br><br>
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-left text-uppercase">
                      <th width="3%">#</th>
                      <th>Title/Content</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if($data->count()>0)
                    @foreach ($data as $key => $h)
                      <tr>
                          <td>{{++$key}}</td>
                          <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$h->title}}</span>
                            <img src="{{asset('images/news/'.$h->image)}}" style="width: 30%;"><br>
                            <span class="text-muted font-size-xs">{{$h->content}}</span>
                          </td>
                          <td class="text-center">
                              <a href="{{route('news.edit',$h->id)}}" class="btn btn-sm btn-light-warning">Edit</a>
                              <a href="{{route('news.delete',$h->id)}}" class="btn btn-sm btn-light-danger">Delete</a>
                          </td>
                      </tr>
                    @endforeach
                  @else
                      <tr>
                        <td colspan="3" class="text-center">No data available in table</td>
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
            <form action="{{ route('setting.update') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Value</label>
                        <input id="value" type="text" name="amount" class="form-control" placeholder="Value">
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

