@extends('layouts/website')

@section('content')
<section class="operator-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-header">
                    <h2>Operator</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="gp-tab" data-toggle="tab" href="#gp" role="tab"
                            aria-controls="gp" aria-selected="true"><img height="18"
                                src="{{ asset('assets/website') }}/assets/img/operator/gp.jpg" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bl-tab" data-toggle="tab" href="#bl" role="tab" aria-controls="bl"
                            aria-selected="false"><img height="18"
                                src="{{ asset('assets/website') }}/assets/img/operator/bl.png" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="airtel-tab" data-toggle="tab" href="#airtel" role="tab"
                            aria-controls="airtel" aria-selected="false"><img height="18"
                                src="{{ asset('assets/website') }}/assets/img/operator/airtel.png" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="robi-tab" data-toggle="tab" href="#robi" role="tab" aria-controls="robi"
                            aria-selected="false"><img height="18"
                                src="{{ asset('assets/website') }}/assets/img/operator/robi.jpg" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="telitok-tab" data-toggle="tab" href="#telitok" role="tab"
                            aria-controls="telitok" aria-selected="false"><img height="18"
                                src="{{ asset('assets/website') }}/assets/img/operator/teletalk.png" alt=""></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="gp" role="tabpanel" aria-labelledby="gp-tab">
                        <div class="row">
                            @foreach($GrameenPhone as $gpData)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img"
                                            src="{{ $gpData->pd_image? asset('uploads/package/'.$gpData->pd_image) : asset('assets/website/assets/img/operator/gp-1.jpeg') }}"
                                            alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$gpData->pd_data}} GB + {{$gpData->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$gpData->pd_offer}} <del class="operator-del">TK
                                                        {{$gpData->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$gpData->pd_validity}} Days</span>
                                                <span>{{$gpData->pd_title}}</span>
                                                    <a class="service_button operator-btn" href="{{route('site_details',$gpData->pd_slug)}}">{{ $gpData->pd_check=='1'?
                                                        "Check" : "Buy" }}</a>

                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bl" role="tabpanel" aria-labelledby="bl-tab">
                        <div class="row">
                            @foreach($Banglalink as $blData)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img"
                                            src="{{ $blData->pd_image? asset('uploads/package/'.$blData->pd_image) : asset('assets/website/assets/img/operator/bl-2.gif') }}"
                                            alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$blData->pd_data}} GB + {{$blData->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$blData->pd_offer}} <del class="operator-del">TK
                                                        {{$blData->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$blData->pd_validity}} Days</span>
                                                <span>{{$blData->pd_title}}</span>
                                                    <a class="service_button operator-btn" href="{{route('site_details',$blData->pd_slug)}}">{{ $blData->pd_check=='1'?
                                                        "Check" : "Buy" }}</a>

                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="airtel" role="tabpanel" aria-labelledby="airtel-tab">
                        <div class="row">
                            @foreach($Airtel as $atData)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img"
                                            src="{{ $atData->pd_image? asset('uploads/package/'.$atData->pd_image) : asset('assets/website/assets/img/operator/airtel-3.png') }}"
                                            alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$atData->pd_data}} GB + {{$atData->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$atData->pd_offer}} <del class="operator-del">TK
                                                        {{$atData->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$atData->pd_validity}} Days</span>
                                                <span>{{$atData->pd_title}}</span>
                                                <a class="service_button operator-btn" href="{{route('site_details',$atData->pd_slug)}}">{{ $atData->pd_check=='1'?
                                                        "Check" : "Buy" }}</a>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="robi" role="tabpanel" aria-labelledby="robi-tab">
                        <div class="row">
                            @foreach($Robi as $robiData)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img"
                                            src="{{ $robiData->pd_image? asset('uploads/package/'.$robiData->pd_image) : asset('assets/website/assets/img/operator/robi-5.png') }}"
                                            alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$robiData->pd_data}} GB + {{$robiData->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$robiData->pd_offer}} <del class="operator-del">TK
                                                        {{$robiData->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$robiData->pd_validity}} Days</span>
                                                <span>{{$robiData->pd_title}}</span>
                                                <a class="service_button operator-btn" href="{{route('site_details',$robiData->pd_slug)}}">{{ $robiData->pd_check=='1'? "Check" : "Buy" }}</a>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="telitok" role="tabpanel" aria-labelledby="telitok-tab">
                        <div class="row">
                            @foreach($Talitalk as $telData)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img"
                                            src="{{ $telData->pd_image? asset('uploads/package/'.$telData->pd_image) : asset('assets/website/assets/img/operator/telitok-6.jpeg') }}"
                                            alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$telData->pd_data}} GB + {{$telData->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$telData->pd_offer}} <del class="operator-del">TK
                                                        {{$telData->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$telData->pd_validity}} Days</span>
                                                <span>{{$telData->pd_title}}</span>
                                                <a class="service_button operator-btn" href="{{route('site_details',$telData->pd_slug)}}">{{ $telData->pd_check=='1'? "Check" : "Buy" }}</a>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
