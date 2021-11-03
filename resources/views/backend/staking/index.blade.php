@extends('layouts.backend',['active'=>'invest','page'=>'staking'])

@section('page-title')
Invest
@endsection

@section('content')
@include('layouts.partials.alert')
<div class="card card-custom">
  <div class="card-header">
    <h3 class="card-title">Invest</h3>
  </div>
  <!--begin::Form-->
  <form class="form" action="{{route('program.register')}}" method="POST">
    <div class="card-body">
      @csrf
      <div class="form-group">
          <label>Package</label>
          <select id="package" name="package" style="width: 100%;" class="form-control select2">
            <option value="">Choose Package</option>
            @foreach($packages as $value)
              <option value="{{$value->id}}" data-amount="{{$value->amount}}">{{$value->name}} ~ €{{number_format($value->amount)}}</option>
            @endforeach
          </select>
      </div>
      <div class="form-group">
          <label>Composition Wallet</label>
          <select id="wallet" name="wallet" style="width: 100%;" class="form-control select2">
            <option value="">Choose Composition Wallet</option>
          </select>
      </div>
      <div class="form-group row hidden" id="grp_input">
          <div class="col-md-12">
              <div class="row">
                  <div class="hidden" id="input_bi">
                      <label>Harvest Wallet</label>
                      <input id="balance_income" type="text" readonly placeholder="Harvest Wallet" class="form-control">
                  </div>
                  <div class="hidden" id="input_bca">
                      <label>Register Wallet</label>
                      <input id="balance_credit" type="text" readonly placeholder="Register Wallet" class="form-control">
                  </div>
              </div>
          </div>
      </div>
      <div class="form-group">
          <label>Security Password</label>
          <input id="password_package" name="security_password" type="password" placeholder="Security Password" class="form-control">
      </div>
    </div>
    <div class="card-footer text-right">
      <div id="buypackage">
        <button id="btn_buypackage" type="submit" class="btn btn-light-primary mr-2">Submit</button>
        <button id="btn_clear" type="button" class="btn btn-light-danger">Cancel</button>
      </div>
      <div class="text-center hidden" id="loader">
        <i class="fa fa-spinner fa-spin"></i>
      </div>
    </div>
   </form>
  <!--end::Form-->
</div>
@endsection

@section('script')
<script type="text/javascript">
    var one,two,three,package,nomimal1,nomimal2;
    $('#package').on('change', function() {
        var value = $(this).val();
        if(value != ''){
          getComposition(value);
          package = $(this).find(':selected').data('amount');
          var wallet = $('#wallet').val();
          if(wallet == 1){
              nomimal1 = package*one;
              nomimal2 = package*two;
              $('#grp_input').removeClass('hidden');
              $('#input_bi').removeClass('hidden col-md-6');
              $('#input_bi').addClass('col-md-12');
              $('#input_bca').addClass('hidden');
              $('#balance_income').val(addCommas(parseFloat(nomimal1).toFixed(2)));
              $('#balance_credit').val(addCommas(parseFloat(nomimal2).toFixed(2)));
          }else if(wallet == 2 || wallet == 5){
              nomimal1 = package*one;
              nomimal2 = package*two;
              $('#grp_input').removeClass('hidden');
              $('#input_bca').removeClass('hidden col-md-6');
              $('#input_bi').removeClass('hidden col-md-6 col-md-12');
              $('#input_bca').addClass('col-md-6');
              $('#input_bi').addClass('col-md-6');

              $('#balance_income').val(addCommas(parseFloat(nomimal1).toFixed(2)));
              $('#balance_credit').val(addCommas(parseFloat(nomimal2).toFixed(2)));
          }
        }else{
            $("#wallet").val("").trigger("change");
            $('#grp_input').addClass('hidden');
            package = 0;
        }
    });

    $('#wallet').on('change', function() {
        var value = $(this).val();
        one = $(this).find(':selected').data('one');
        two = $(this).find(':selected').data('two');
        three = $(this).find(':selected').data('three');
        if(value == 1){
            nomimal1 = package*one;
            nomimal2 = package*two;
            $('#grp_input').removeClass('hidden');
            $('#input_bi').removeClass('hidden col-md-6');
            $('#input_bi').addClass('col-md-12');
            $('#input_bca').addClass('hidden');
        
            $('#balance_income').val(addCommas(parseFloat(nomimal1).toFixed(2)));
            $('#balance_credit').val(addCommas(parseFloat(nomimal2).toFixed(2)));
        }else if(value == 2 || value == 5){
            nomimal1 = package*one;
            nomimal2 = package*two;
            $('#grp_input').removeClass('hidden');
            $('#input_bca').removeClass('hidden col-md-6');
            $('#input_bi').removeClass('hidden col-md-6 col-md-12');
            $('#input_bca').addClass('col-md-6');
            $('#input_bi').addClass('col-md-6');

            $('#balance_income').val(addCommas(parseFloat(nomimal1).toFixed(2)));
            $('#balance_credit').val(addCommas(parseFloat(nomimal2).toFixed(2)));
        }
    });

    $('#btn_buypackage').on('click',function () {
        $('#buypackage').addClass('hidden');
        $('#loader').removeClass('hidden');

        if($('#password_package').val() == ''){
          $('#buypackage').removeClass('hidden');
          $('#loader').addClass('hidden');
        }
    });

    $('#btn_clear').on('click',function () {
      $("#package").val("").trigger("change");
      $("#wallet").val("").trigger("change");
      $('#grp_input').addClass('hidden');
      $('#password_package').val('');
    });

    function getComposition(id) {
      $('#grp_input').addClass('hidden');
      $('#wallet').empty();
      var composition = [];
      $.ajax({
          url:'{{ url('/plan/composition') }}/'+id,
          type:'GET',
          success:function(data) {
            console.log(data);
            $('#wallet').append('<option value="">Choose Composition Wallet</option>');
            $.each(data, function(i, item) {
                if(item.id == 1){
                  var value = "Harvet Wallet " + (item.one*100) +"%";
                }else{
                  var value = "Harvet Wallet " + (item.one*100) +"% & Register Wallet "+ (item.two*100) +"%";
                }
                composition[i] = "<option value='" + item.id + "' data-one='" + item.one + "' data-two='"+ item.two +"' data-three='"+ item.three +"'>" + value + "</option>";
            });
            $('#wallet').append(composition);
          },
      });
    }
</script>
@endsection
