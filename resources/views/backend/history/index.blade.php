@extends('layouts.backend',['page'=>'history'])

@section('page-title')
History
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                <span class="nav-icon">
                                    <i class="flaticon2-time"></i>
                                </span>
                                <span class="nav-text">Stacking</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-12 col-xl-12">
                              <form action="{{ route('history.index') }}" method="get" id="form-search">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 my-2 my-md-0"></div>
                                    <div class="col-lg-6 my-2 my-md-0">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search Address / TXID">
                                          <div class="input-group-append">
                                              <button class="btn btn-danger" type="submit"><i class="flaticon2-search-1 text-white"></i></button>
                                          </div>
                                      </div>
                                    </div>

                                </div>
                              </form>
                            </div>
                        </div>
                        @forelse($data as $key => $value)
                        <div class="row text-center border p-5 mb-3 border-radius-5 shadow-xs">
                            <div class="col-lg-6 text-center">
                                <p><a class="text-warning" target="_blank" href="https://tronscan.org/#/address/{{$value->address}}">{{$value->address}}</a></p>
                                <p><a style="font-size: 10px;" class="text-muted" target="_blank" href="https://tronscan.org/#/transaction/{{$value->txid}}">{{$value->txid}}</a></p>
                                <p style="font-size: 11px;">{{$value->created_at}}</p>
                            </div>
                            <div class="col-lg-6 text-center">
                                <p>Amount : <b class="mr-3">{{number_format($value->amount,4)}} MIRA</b> Earn : <b>{{($value->stakings->annualized_yield * 100)}}%</b></p>
                                <p>Stake : <b class="mr-3">{{$value->stakings->name}}</b> Profit/Day : <b class="text-success">{{number_format(($value->amount*$value->stakings->annualized_yield)/$value->stakings->duration,4)}}</b></p>
                            </div>
                        </div>
                        @empty
                          <tr>
                            <td colspan="7" class="text-center">No data available in table</td>
                          </tr>
                        @endforelse
                        {{$data->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection