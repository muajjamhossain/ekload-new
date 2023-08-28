@extends('layouts/website')

@section('content')
    @push('websiteCustomCss')
        <style>

        </style>
    @endpush
    <section class="payment-area section-padding">
        <div class="container">
            <form method="post" action="{{ route('pac_info_update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="payment-content text-center">
                                        <h4>Mr. {{ Auth::user()->name }}</h4>
                                        <p>আপনি আমাদের নিকট একজন সম্মানিত ক্রেতা, যেকোনো সময় আপনাকে সেবা দিতে আমরা প্রস্তুত</p>
                                        <h5>পেমেন্ট সংক্রান্ত তথ্য</h5>
                                        <p>কোন মাদ্ধমে টাকা পাঠিয়েছেন তা নির্বাচন করুন</p>
                                    </div>

                                    <div class="payment-select-input mt-5 mb-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="payment-select-option">
                                                    <select class="form-control @error('gateway') is-invalid @enderror" name="gateway" required>
                                                        <option>Bkash</option>
                                                        <option>Rocket</option>
                                                        <option>Nogod</option>
                                                    </select>
                                                    @error('gateway')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="payment-input-digit">
                                                    <input type="text" class="@error('lastno') is-invalid @enderror" placeholder="4 digit number" name="lastno">
                                                    @error('lastno')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <input type="hidden" name="pac_slug" value="{{ $pac_sell->pac_slug }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-notic-list">
                                        <div class="payment-notic text-center mb-3">
                                            <h5 style="color: red;"><b>Notes</b></h5>
                                        </div>
                                        <ul>
                                            <li>প্রেমেন্ট সম্পন্ন করার পর প্যাকেজ একটিভ হতে সর্বোচ্চ ১ থেকে ৫ মিনিট সময় লাগতে পারে।</li>
                                            <li>যেকোনো প্রয়োজনে লাইভ চ্যাটে যোগাযোগ করুন।</li>
                                            <li>যেকোনো প্রয়োজনে লাইভ চ্যাটে যোগাযোগ করুন।</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-4 text-center">
                                    <div class="payment-submit-btn">
                                        {{-- <a href="#">Send</a> --}}
                                        <button type="submit" class="btn btn-md btn-danger">Send tttt</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('websiteCustomScripts')

    @endpush
@endsection
