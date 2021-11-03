@extends('layouts.backend',['active'=>'convert','page'=>'convert'])

@section('page-title')
MIRA
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="font-weight-bolder text-dark"><img alt="Logo" src="{{asset('images/logo/favicon.png')}}" width="32px" /> MIRA</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Current Balance : {{number_format($saldo,8)}}</span>
                </h3>
            </div>
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                <span class="nav-icon">
                                    <i class="flaticon2-time"></i>
                                </span>
                                <span class="nav-text">Deposit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                <span class="nav-icon">
                                    <i class="flaticon2-time"></i>
                                </span>
                                <span class="nav-text">Withdraw</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                        <div class="form-group mt-2">
                            <label> Deposit wallet address</label>
                            @if($wallet_address)
                            <input class="form-control" id="address" name="address" type="text" placeholder="Deposit wallet address" value="{{$wallet_address}}">
                            @else
                            <a href="{{route('wallet.create')}}" class="btn btn-light-primary mr-2">Create Address</a>
                            @endif
                        </div>
                        <img class="mb-2" src="{{$qrCode}}">
                        <h3 class="text-danger">Important</h3>
                        <ul>
                          <li>The above address should only be used for depositing MIRA. Sending other assets to this address will result in them becoming lost</li>
                          <li>Deposits are usually available after 10 blockchain confirmations</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                        <form class="form" action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Amount</label>
                                <input id="amount" name="amount" type="text" placeholder="Amount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Withdrawal Address</label>
                                <input id="address" name="address" type="text" placeholder="Withdrawal Address" class="form-control">
                            </div>
                          <div class="text-right">
                            <div id="action_wd">
                              <button id="btn_wd" type="submit" class="btn btn-light-primary mr-2">Withdraw</button>
                              <button id="btn_clear" type="button" class="btn btn-light-danger">Cancel</button>
                            </div>
                            <div class="text-center hidden" id="loader">
                              <i class="fa fa-spinner fa-spin"></i>
                            </div>
                          </div>
                        </form>
                    </div>

                    <div> Stacking</div>>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

    import TronStationSDK from 'tron-station-sdk';
    import TronWeb from 'tronweb';

    const HttpProvider = TronWeb.providers.HttpProvider;
    const fullNode = new HttpProvider('https://api.trongrid.io');
    const solidityNode = new HttpProvider('https://api.trongrid.io');
    const eventServer = new HttpProvider('https://api.trongrid.io');

    const privateKey = 'da146374a75310b9666e834ee4ad0866d6f4035967bfc76217c5a495fff9f0d0';

    const tronWeb = new TronWeb(
        fullNode,
        solidityNode,
        eventServer,
        privateKey
    );

    // Constructor params are the tronWeb object and specification on if the net type is on main net or test net/private net
    const tronStationSDK = new TronStationSDK(tronWeb, true);

</script>
@endsection