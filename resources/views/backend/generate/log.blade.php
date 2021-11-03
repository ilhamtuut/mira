@extends('layouts.backend',['active'=>'log','page'=>'generate'])

@section('page-title')
Log
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-body">
        <!--begin: Datatable-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-left text-uppercase">
                      <th>No</th>
                      <th>Activity</th>
                      <th class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                  @if($data->count()>0)
                      @foreach ($data as $key => $h)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>{{$h->activity}}</td>
                              <td class="text-center">{{$h->created_at}}</td>
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
@endsection