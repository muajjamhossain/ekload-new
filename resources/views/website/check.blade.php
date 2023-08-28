@extends('layouts/website')
@push('customCss')
    <style>
        .notic-text{
            font-size: 10px;
        }
        .btn{
            border-radius: 15px;
        }
    </style>
@endpush

@section('content')

<section class="payment-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="text-center card-body">
                        <div class="check-content-body">
                            <div class="check-image">
                                <img src="{{asset('uploads/package/'.$pac->pd_image)}}" alt="">
                            </div>
                            <div class="check-moddle-content">
                                    <span class="check-main-title"><b>{{$pac->pd_data}}+{{$pac->pd_minute}} Minute</b></span><br>
                                    <span class="check-tk-top">TK {{$pac->pd_offer}}</span><br>
                                    <span class="check-top-del"><del>TK {{$pac->pd_regular}}</del></span><br>
                                    <span style="color: red;display: inline-block;padding-bottom: 5px;padding-top: 10px;">Validity:  {{$pac->pd_validity}}  Days</span><br>
                                    <span style="color: red;display: inline-block;margin-bottom: 10px;">{{$pac->pd_title}}</span>
                                </div>
                            <div class="check-footer">
                                <span class="check-details-top"><b>আপনি এখন গেস্ট মুডে অফার ক্রয় করছেন অথবা সাইন ইন করুন</b></span><br>
                                <span class="check-top-phone">মোবাইল নাম্বার দিন</span><br>
                                <span class="check-top-input"><input type="number" placeholder="মোবাইল নাম্বার"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 check-padding-small-device">
                <div class="card">
                    <div class="card-body">
                        <div class="check-notic-left">
                            <div class="text-center check-notic-title">
                                <h3>Notes</h3>
                            </div>
                            <div class="check-notic-list">
                                <ul>
                                    <li class="notic-text">অনুগ্রহপূর্বক আপনার লগইন কৃত নাম্বারটি লাইভ চ্যাটে সেন্ড করুন। ।</li>
                                    <li class="notic-text">লাইভ চ্যাটে আপনাকে জানিয়ে দেওয়া হবে আপনার নাম্বারটি অফারের আওতাভুক্ত কিনা।</li>
                                    <li class="notic-text">যেকোনো প্রয়োজনে লাইভ চ্যাটে যোগাযোগ করুন।</li>
                                    <li class="notic-text">লাইভ চ্যাটে নিশ্চিত হয়ে টাকা পাঠাবেন।</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 card">
                    <div class="card-body">
                        <div class="check-notic-left">
                            <div class="text-center check-notic-title">
                                <h3>Confirmation</h3>
                            </div>
                            <div class="check-notic-list">
                                <ul>
                                    <li class="notic-text">অনুগ্রহপূর্বক আপনার লগইন কৃত নাম্বারটি লাইভ চ্যাটে সেন্ড করুন। ।</li>
                                    <li class="notic-text">লাইভ চ্যাটে আপনাকে জানিয়ে দেওয়া হবে আপনার নাম্বারটি অফারের আওতাভুক্ত কিনা।</li>
                                    <li class="notic-text">যেকোনো প্রয়োজনে লাইভ চ্যাটে যোগাযোগ করুন।</li>
                                    <li class="notic-text">লাইভ চ্যাটে নিশ্চিত হয়ে টাকা পাঠাবেন।</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center col-md-12">
                <div class="term-btn">
                    <button type="submit" class="btn btn-md btn-danger">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

@push('customScripts')

@endpush
@endsection
