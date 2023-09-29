@extends('layouts/website')

@section('content')
    @push('websiteCustomCss')
        <style>
            h4 {
                font-size: 18px;
                text-align: center;
            }

            .mt-4, .my-4 {
                margin-top: 0.5rem!important;
            }

            .mt-3, .my-3 {
                margin-top: 0rem!important;
            }
            #paybleRate{
                font-size: 18px;
                text-align: center;
                color: red;
            }
        </style>
    @endpush

    <section class="payment-area section-padding">
        <div class="container">
            <form method="post" action="{{ route('order_package_info_send') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="check-content-body">
                                    <div class="check-image">
                                        <img src="{{ asset('uploads/package/' . $pac->pd_image) }}" alt="">
                                    </div>
                                    <div class="check-moddle-content">
                                        <span class="check-main-title"><b>{{ $pac->pd_data }}+{{ $pac->pd_minute }}
                                                Minute</b></span><br>
                                        <span class="check-tk-top">TK {{ $pac->pd_offer }}</span><br>
                                        <span class="check-top-del"><del>TK {{ $pac->pd_regular }}</del></span><br>
                                        <span
                                            style="color: red;display: inline-block;padding-bottom: 5px;padding-top: 10px;">Validity:
                                            {{ $pac->pd_validity }} Days</span><br>
                                        <span style="color: red;display: inline-block;margin-bottom: 10px;">{{ $pac->pd_title }}</span>
                                        <input type="hidden" name="pd_id" value="{{ $pac->pd_id }}" id="pd_id"/>
                                    </div>

                                    <div class="check-footer">
                                        @if (!Auth::check())
                                            <span class="check-details-top"><b>আপনি এখন গেস্ট মোড অফার ক্রয় করছেন </b></span><br>
                                            <small> <a href="{{ route('login') }}">পয়েন্ট ও রিওয়ার্ড পেতে লগইন করুন</a></small><br>
                                            <span class="check-top-phone">মোবাইল নাম্বার দিন</span><br>
                                            <span class="check-top-input">
                                                <input type="text" name="withOutAuthenticNumber" maxlength="11" minlength="11" placeholder="01*********" @required(true)>
                                            </span>
                                        @else
                                            <span class="check-details-top"><b>অফারটি কার জন্য তা নির্বাচন করুন</b></span><br>
                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="col">
                                                    <div class="text-left form-check">
                                                        <input class="form-check-input authenticNumberRadioClass" type="radio" name="numberOfLoad" value="authenticNumberRadio" id="authenticNumberRadio" checked>
                                                        <label class="form-check-label" for="authenticNumberRadio">{{ Auth::user()->phone }} </label>
                                                    </div>
                                                    <div class="text-left form-check">
                                                        <input class="form-check-input authenticNumberRadioClass" type="radio" name="numberOfLoad" value="authenticAnothreNumberRadio" id="authenticAnothreNumberRadio" @required(true)>
                                                        <label class="form-check-label" for="authenticAnothreNumberRadio">অন্য কোনো নম্বর </label>
                                                    </div>
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                            <span class="check-top-input d-none" id="authenticAnothreNumberField">
                                                <input type="number" name="authenticAnothreNumberField" placeholder="মোবাইল নাম্বার">
                                            </span>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 check-padding-small-device">

                        @if ($pac->pd_check == '1')

                            @if($basic->basic_note != null)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="check-notic-left">
                                            <div class="text-center check-notic-title">
                                                <h3>নোটিশ</h3>
                                            </div>
                                            <div class="check-notic-list" id="note"> </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($basic->basic_confirmation != null)
                                <div class="mt-3 card">
                                    <div class="card-body">
                                        <div class="check-notic-left">
                                            <div class="text-center check-notic-title">
                                                <h3>নিশ্চিত হোন</h3>
                                            </div>
                                            <div class="check-notic-list" id="confirmation">{{ $basic->basic_confirmation }} </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @else

                        @endif


                        <div class="card">
                            <div class="card-body">
                                <div class="card-content-body">
                                    <div class="team-title">
                                        <h4>নিম্নে উল্লেখিত নাম্বারে নির্ধারিত
                                            (<span id="paybleRate">{{ $pac->pd_offer }}</span>)
                                             টাকা সেন্ড মানি করুন</h4>

                                    </div>
                                    <div class="mt-4 text-center team-middle-content">
                                        <span class="check-top-input d-none" id="couponCode">
                                            <input type="text" class="text-center" name="coupon" id="coupon" placeholder="নাম্বার">
                                            <input type="hidden" name="paybleAmount" value="" id="paybleAmount">
                                        </span>
                                        <button type="submit" id="applyCoupon" class="btn-sm btn-success d-none">কুপন জমা দিন</button>
                                        <button type="button" id="availableCoupon" class="btn-sm btn-success">কুপন ব্যবহার করুন</button>
                                        <div id="message"></div>

                                    </div>
                                    {{-- @foreach ($allGateway as $gateway)
                                        <div class="mt-4 text-center team-middle-content">
                                            <div class="team-icon-number">
                                                <a href="{{ $gateway->pg_url }}">
                                                    <span class="team-img"><img height="30"
                                                            src="{{asset('uploads/gateway/'.$gateway->logo)}}"
                                                            alt=""></span>
                                                    <span class="team-number"><b>{{ $gateway->pg_number }}</b></span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center col-md-12">
                        <div class="term-btn">
                            {{-- <a href="#">Next</a> --}}
                            <input type="checkbox" id="checkme"/> সম্মত আছি <br/>
                            <button type="submit" class="btn btn-md btn-danger" id="sendNewSms" >পে করুন</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @php

        $noteData = "";
        $confirmData = "";
        if($pac->pd_check == '1'){
            $noteData = "$basic->basic_note";
            $confirmData = "$basic->basic_confirmation";
        }

        $encodedNote = json_encode($noteData);
        $encodedConfirm = json_encode($confirmData);
    @endphp

    @push('websiteCustomScripts')
        <script>
            $(document).ready(function() {

                var checker = document.getElementById('checkme');
                var sendbtn = document.getElementById('sendNewSms');
                sendbtn.disabled = true;
                sendbtn.style.cursor = 'wait';

                checker.onchange = function() {
                    // document.getElementById('sendNewSms').removeAttribute('disabled');
                    sendbtn.disabled = !this.checked;
                    sendbtn.style.cursor = 'pointer';
                };



                var rawNote = <?php echo $encodedNote; ?>;
                var formattedNote = rawNote.replace(/\\n/g, '<br>');
                document.getElementById("note").innerHTML = formattedNote;

                var rawConfirm = <?php echo $encodedConfirm; ?>;
                var formattedConfirm = rawConfirm.replace(/\\n/g, '<br>');
                document.getElementById("confirmation").innerHTML = formattedConfirm;


                $('.authenticNumberRadioClass').on('change', function() {
                    $('#authenticAnothreNumberField').toggleClass('d-none');
                });


                $('#availableCoupon').click(function() {
                    $('#availableCoupon').addClass('d-none');
                    $('#applyCoupon').removeClass('d-none');
                    $('#couponCode').removeClass('d-none');
                    $("#coupon").attr('required',true);
                })

                $('#applyCoupon').click(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('applyCoupon') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            "_token": "{{ csrf_token() }}",
                            coupon: $("#coupon").val(),
                            pd_id: $("#pd_id").val(),
                            paybleRate: $("#paybleRate").text(),
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 200) {
                                $('#availableCoupon').removeClass('d-none');
                                $('#applyCoupon').addClass('d-none');
                                $('#couponCode').addClass('d-none');
                                $("#coupon").attr('required',false);
                                $('#availableCoupon').addClass('d-none');
                            }
                            $("#paybleRate").text(data.amount);
                            $("#paybleAmount").val(data.amount);
                            $("#message").text(data.message).css({'color':'red'});
                        }
                    });
                });
            })
        </script>
    @endpush
@endsection
