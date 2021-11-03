@extends('layouts.backend',['page'=>'home'])

@section('page-title')
Dashboard
@endsection

@section('content')
{{-- <div class="row">
    <div class="col-lg-6">
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <div class="card-header border-0 bg-danger py-5">
                <h3 class="card-title font-weight-bolder text-white">Infomation</h3>
            </div>
            <div class="card-body p-0 position-relative overflow-hidden">
                <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                <div class="card-spacer mt-n25">
                    <div class="row m-0">
                        <div class="col bg-light-danger px-6 py-8 rounded-xl">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <img alt="Logo" src="{{asset('images/logo/favicon.png')}}" width="32px" />
                            </span>
                            <span href="#" class="text-danger font-weight-bold font-size-h6 mt-2">MIRA</span>
                        </div>
                    </div>
                    <br>
                    <a href="{{route('wallet.index')}}" class="btn btn-danger btn-block">Deposit MIRA</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xxl-4">
        <!--begin::List Widget 9-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="font-weight-bolder text-dark">My Activity</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
                </h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-clean btn-hover-light-danger btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-footer py-4">
                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                    <i class="ki ki-eye icon-sm"></i>See All</a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-4">
                <div class="timeline timeline-5 mt-3">
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">08:42</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-warning icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Text-->
                        <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Outlines keep you honest. And keep structure</div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-success icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Content-->
                        <div class="timeline-content d-flex">
                            <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-danger icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Desc-->
                        <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit
                        <a href="#" class="text-primary">USD 700</a>. to ESL</div>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-primary icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Text-->
                        <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-danger icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Desc-->
                        <div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed
                        <a href="#" class="text-primary">#XF-2356</a>.</div>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-info icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Text-->
                        <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest. Indulging in poorly driving</div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-primary icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Text-->
                        <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item align-items-start">
                        <!--begin::Label-->
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-danger icon-xl"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Desc-->
                        <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">New order placed
                        <a href="#" class="text-primary">#XF-2356</a>.</div>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end: Items-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end: Card-->
        <!--end: List Widget 9-->
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="font-weight-bolder text-dark"><img alt="Logo" src="{{asset('images/logo/favicon.png')}}" width="32px" /> Staking MIRA</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">MIRA Foundation</span>
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
                                <span class="nav-text">90 Days</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                <span class="nav-icon">
                                    <i class="flaticon2-time"></i>
                                </span>
                                <span class="nav-text">180 Days</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">
                                <span class="nav-icon">
                                    <i class="flaticon2-time"></i>
                                </span>
                                <span class="nav-text">360 Days</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                        <div class="row">
                            <div class="col-lg-2">
                                <h1 class="text-danger">2,25%</h1>
                                <p>Annualized Yield</p>
                                <p class="mb-0">Min. Deposit</p>
                                <h3>10</h3>
                            </div>
                            <div class="col-lg-10">
                                <p>This product offers interest on your MIRA crypto asset holdings. Contribute your MIRA to this fixed deposit product and start earning interest, payable in MIRA. Click the different periods above to see the effect on the yield available.</p>
                                <a class="btn btn-light-danger" href="{{route('earn.index')}}">See Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                        <div class="row">
                            <div class="col-lg-2">
                                <h1 class="text-danger">4,5%</h1>
                                <p>Annualized Yield</p>
                                <p class="mb-0">Min. Deposit</p>
                                <h3>10</h3>
                            </div>
                            <div class="col-lg-10">
                                <p>This product offers interest on your MIRA crypto asset holdings. Contribute your MIRA to this fixed deposit product and start earning interest, payable in MIRA. Click the different periods above to see the effect on the yield available.</p>
                                <a class="btn btn-light-danger" href="{{route('earn.index')}}">See Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
                        <div class="row">
                            <div class="col-lg-2">
                                <h1 class="text-danger">10%</h1>
                                <p>Annualized Yield</p>
                                <p class="mb-0">Min. Deposit</p>
                                <h3>10</h3>
                            </div>
                            <div class="col-lg-10">
                                <p>This product offers interest on your MIRA crypto asset holdings. Contribute your MIRA to this fixed deposit product and start earning interest, payable in MIRA. Click the different periods above to see the effect on the yield available.</p>
                                <a class="btn btn-light-danger" href="{{route('earn.index')}}">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .apexcharts-active{
        display: none;
    }
</style>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection