<!-- ==================== Footer Area Start ==================== -->
<footer class="footer-area">
    <div class="text-center footer-top-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="footer-top">
                        <div class="footer-social-media d-none d-md-block">
                            <ul>
                                <li><a href="{{$social->sm_facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{$social->sm_youtube}}"><i class="fab fa-youtube"></i></a></li>
                                {{-- <li><a href="{{$social->sm_facebook}}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{$social->sm_linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{$social->sm_twitter}}"><i class="fab fa-twitter"></i></a></li> --}}
                            </ul>
                        </div>
                        <div class="text-center footer-social-dedia-small-device d-md-none">
                            <ul>
                                {{-- <li><a href="#"><i class="fas fa-power-off"></i></a></li> --}}
                                <li><a href="{{$social->sm_facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                {{-- <li><a href="{{$social->sm_linkedin}}"><i class="fab fa-linkedin-in"></i></a></li> --}}
                                <li><a href="{{$social->sm_youtube}}"><i class="fab fa-youtube"></i></a></li>\
                                @if(@Auth::check())
                                    <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i></a></li>
                                @else
                                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3 footer-middle d-none d-md-block">
                        <div class="footer-list">
                            <ul>
                                <li><a href="mailto:{{$contact->cont_email1}}">{{$contact->cont_email1}} |</a></li>
                                <li><a href="tel:{{$contact->cont_phone1}}">{{$contact->cont_phone1}} |</a></li>
                                <li>For any query: mm enterprise</li>
                            </ul>
                            <address style="color: #ffffff;">{{$contact->cont_add1}}</address>
                        </div>
                        <div class="footer-img">
                            <a href="#"><img src="{{ asset('assets/website') }}/assets/img/operator/google-1.png"
                                    width="100" class="mr-2" height="40" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/website') }}/assets/img/operator/apple-2.png"
                                    width="100" height="40" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bootom-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="copywrite">
                        <p>Copyright &copy; 2021 Ekload <span class="d-none d-md-block">| Designed by imo |</span>
                            <strong class="d-none d-md-block">Development by <a target="_blank"
                                    href="https://web.facebook.com/developer.imu/">Muajjam Hossain</a> </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ==================== Footer Area End ==================== -->
