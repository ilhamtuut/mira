@extends('layouts.backend',['active'=>'bonus','page'=>'generate'])

@section('page-title')
Bonus
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <form action="{{route('generate.bonus_pasif')}}" method="get" id="form-search">
                    <div class="form-group text-center">
                        <div id="loader1" class="fa fa-spinner fa-spin hidden" style="font-size: 30px;"></div>
                        <button id="btn_generate_bonus1" type="submit" class="btn btn-light-primary waves-effect waves-light w-100">Generate Bonus Daily</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <form action="{{route('generate.bonus_weekly')}}" method="get" id="form-search">
                    <div class="form-group text-center">
                        <div id="loader2" class="fa fa-spinner fa-spin hidden" style="font-size: 30px;"></div>
                        <button id="btn_generate_bonus2" type="submit" class="btn btn-light-primary waves-effect waves-light w-100">Generate Bonus Weekly</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $('#btn_generate_bonus1').on('click',function () {
        $(this).addClass('hidden');
        $('#loader1').removeClass('hidden');
    });
    $('#btn_generate_bonus2').on('click',function () {
        $(this).addClass('hidden');
        $('#loader2').removeClass('hidden');
    });
</script>
@endsection


