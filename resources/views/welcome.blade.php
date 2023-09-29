@extends('layouts/website')

@section('content')

    <!-- ==================== Slider Area Start ==================== -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach($banner as $ban)
                <div class="single-slider" style="background-image: url({{ asset('uploads/banner/'.$ban->ban_image) }});">
                    <div class="slider-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="slider-content">
                                    <div class="slider-title">
                                        <h2>{{$ban->ban_title}}</h2>
                                    </div>
                                    <div class="slider-text">
                                        <p>{{$ban->ban_details}}</p>
                                    </div>

                                    @if($ban->ban_button!='')
                                    <div>
                                        <a href="{{$ban->ban_button_url}}" class="banner-btn">{{$ban->ban_button}}</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




            {{-- @foreach($banner as $ban)
            <div class="single-banner bg" style="background-image: url('{{asset('uploads/banner/'.$ban->ban_image)}}');">
                <div class="container">
                    <div class="banner-content">
                        <div>
                            <h2>
                                <span>{{$ban->ban_title}}</span>
                            </h2>
                            <p>
                                {{$ban->ban_details}}
                            </p>
                            @if($ban->ban_button!='')
                            <div class="banner-btn">
                                <a href="{{$ban->ban_button_url}}">{{$ban->ban_button}}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach --}}



        </div>
    </div>
    <!-- ==================== Slider Area End ==================== -->

    <!-- ==================== Marquee Area Start ==================== -->
    <section class="marquee-area">
        <div class="container">

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    @if(Session::has('success_pac'))
                      <div class="alert alert-success alertsuccess" role="alert">
                         <strong>সাকসেস !</strong> কিছু সময়ের মধ্যে আপনার  প্যাকেজটি পেয়ে যাবেন
                      </div>
                    @endif
                    @if(Session::has('error'))
                      <div class="alert alert-warning alerterror" role="alert">
                         <strong>Opps!</strong> অনুগ্রহ পূর্বক আবার  করুন .
                      </div>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="marquee-content">
                        <h2>
                            <marquee> {{$basic->basic_title}}</marquee>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Marquee Area End ==================== -->
    <!-- ==================== Operator Area Start ==================== -->
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
    <!-- ==================== Operator Area End ==================== -->

    <!-- ==================== Trending Area Start ==================== -->
    <section class="trending-area section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-header">
                        <h2>Trending</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="trending-active owl-carousel">
                        @foreach($all as $data)
                            <div class="single-trending">
                                <div class="trending-content">
                                    <div class="trending-head">
                                        <h4>{{$data->pd_operator}}</h4>
                                    </div>
                                    <div class="trending-offer border-top">
                                        <div class="row">
                                            <div class="col-4">
                                                <i class="fas fa-phone-volume trending-offer-icons"></i><br>
                                                <span class="trending-offer-number">{{$data->pd_minute}}</span>
                                            </div>
                                            <div class="col-3">
                                                <i class="fas fa-database trending-offer-icons"></i><br>
                                                <span class="trending-offer-number">{{$data->pd_data}}</span>
                                            </div>
                                            <div class="col-5">
                                                <i class="fas fa-clock trending-offer-icons"></i><br>
                                                <span class="trending-offer-number">{{$data->pd_validity}} days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tranding-discount">
                                        <span class="tranding-discount-discount"><b>Discount</b></span>
                                        <span class="tranding-discount-del"><del>tk. {{$data->pd_regular}}</del></span>
                                        <span class="float-right tranding-discount-number" style="color: red;">Tk.
                                            {{$data->pd_offer}}</span>
                                    </div>
                                    <div class="tranding-share">
                                        <span><a class="mr-3" style="color: #000000;" href="#"><i class="fas fa-thumbs-up"></i>
                                                (55)</a></span>
                                        <span><a class="mr-3" style="color: #000000;" href="#"><i
                                                    class="fas fa-share"></i></a></span>
                                        <span>
                                            <a class="tranding-share-buy operator-btn" href="{{route('site_details',$data->pd_slug)}}"> {{ $data->pd_check=='1'? "Check" : "Buy" }}</a>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ==================== Trending Area End ==================== -->

    <!-- ==================== Service Area Start ==================== -->
    <section class="operator-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-header">
                        <h2>Service</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="combo-tab" data-toggle="tab" href="#combo" role="tab"
                                aria-controls="combo" aria-selected="true">Combo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data"
                                aria-selected="false">Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="minute-tab" data-toggle="tab" href="#minute" role="tab"
                                aria-controls="minute" aria-selected="false">Minute</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="combo" role="tabpanel" aria-labelledby="combo-tab">
                            <div class="row">
                                @foreach($combo_pac as $data)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img"
                                            src="{{asset('uploads/package/'.$data->pd_image)}}" alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$data->pd_data}} GB + {{$data->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$data->pd_offer}} <del class="operator-del">TK {{$data->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$data->pd_validity}} Days</span>
                                                <span>{{$data->pd_title}} </span>
                                                <span>
                                                    <a class="service_button operator-btn" href="{{route('site_details',$data->pd_slug)}}">{{ $data->pd_check=='1'?
                                                        "Check" : "Buy" }}</a>
                                                </span>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                            <div class="row">
                                @foreach($data_pac as $data)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="mt-4 card">
                                        <img height="200" class="card-img-top operator-img" src="{{asset('uploads/package/'.$data->pd_image)}}" alt="">
                                        <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                            <div class="text-center operator-content">
                                                <span class="operator-gb"><b>{{$data->pd_data}} GB + {{$data->pd_minute}} Minute</b></span>
                                                <span class="operator-main-tk">TK {{$data->pd_offer}} <del class="operator-del">TK {{$data->pd_regular}}
                                                    </del></span>
                                                <span>Validity: {{$data->pd_validity}} Days</span>
                                                <span>{{$data->pd_title}} </span>
                                                <span>
                                                    <a class="service_button operator-btn" href="{{route('site_details',$data->pd_slug)}}">{{ $data->pd_check=='1'?
                                                        "Check" : "Buy" }}</a>
                                                </span>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="minute" role="tabpanel" aria-labelledby="minute-tab">
                            <div class="row">
                                @foreach($minute_pac as $data)
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="mt-4 card">
                                            <img height="200" class="card-img-top operator-img" src="{{asset('uploads/package/'.$data->pd_image)}}" alt="">
                                            <ul class="pt-3 pb-3 list-group list-group-flush border-top">
                                                <div class="text-center operator-content">
                                                    <span class="operator-gb"><b>{{$data->pd_data}} GB + {{$data->pd_minute}} Minute</b></span>
                                                    <span class="operator-main-tk">TK {{$data->pd_offer}} <del class="operator-del">TK {{$data->pd_regular}}
                                                        </del></span>
                                                    <span>Validity: {{$data->pd_validity}} Days</span>
                                                    <span>{{$data->pd_title}} </span>
                                                    <span>
                                                        <a class="service_button operator-btn" href="{{route('site_details',$data->pd_slug)}}">{{ $data->pd_check=='1'?
                                                            "Check" : "Buy" }}</a>
                                                    </span>
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
    <!-- ==================== Service Area End ==================== -->
@endsection
