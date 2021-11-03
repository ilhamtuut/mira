@extends('layouts.backend',['active'=>'convert','page'=>'convert'])

@section('page-title')
MIRA
@endsection

@section('content')
@include('layouts.partials.alert')

<div class="card-body">
<div class="tab-content">
    <div class="tab-pane fade active show" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
        <div class="form-group mt-2">
            <label> Stacking Coin </label>
            
            <input class="form-control" id="address" name="address" type="text" placeholder="Amount" value="">
            
        </div>
        
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
@endsection