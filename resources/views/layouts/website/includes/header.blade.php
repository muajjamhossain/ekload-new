<!-- ==================== Header Area Start ==================== -->
<header class="header-area">
    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav class="float-right navbar navbar-expand-lg navbar-light">
                        <div class="custom-call">
                            <ul>
                                <li style="padding-right: 15px;"><a href="#">Questions?</a></li>
                                <li style="padding-right: 5px;color: #3f4754;">Call Us: <a href="tel:{{$contact->cont_phone1}}"
                                        title="{{$contact->cont_phone1}}"> {{$contact->cont_phone1}}</a></li>
                            </ul>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="mr-auto navbar-nav">
                                <li class="nav-item dropdown">
                                    <a style="color: #3f4754;" class="nav-link dropdown-toggle" href="#"
                                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"> {{@Auth::check()?@Auth::user()->name:'Account'}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(@Auth::check())
                                            <a style="color: #3f4754;" class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                            <a style="color: #3f4754;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>

                                        @else
                                            <a style="color: #3f4754;" class="dropdown-item" href="{{ route('login') }}">Login</a>
                                            <a style="color: #3f4754;" class="dropdown-item" href="{{ route('sign-up') }}">Sign Up</a>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img src="{{ $basic->basic_logo? asset('uploads/basic/'.$basic->basic_logo) : asset('assets/website/assets/img/logo/logo.png')}}" alt="" width="120px"
                                height="50px">
                        </a>


                        @php
                            $reminder = 0;
                            $reminder = App\Models\Reminder::where('status',1)->where('user_id', @Auth::user()->id)->count();
                        @endphp

                        <a href="{{ route('my-reminder') }}" class="notification">
                            <span><i class="fa fa-bell" aria-hidden="true"></i></span>
                            @if($reminder != 0)
                                <span class="badge">{{ $reminder }}</span>
                            @endif
                        </a>

                        <ul class="navbar-nav d-lg-none">
                            <li class="nav-item dropdown">
                                <a style="color: #3f4754;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{@Auth::check()?@Auth::user()->name:'Account'}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(@Auth::check())
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>


                                    @else
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{ route('sign-up') }}">Sign Up</a>
                                    @endif
                                </div>
                            </li>
                        </ul>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                            <ul class="mr-auto navbar-nav">
                                <li class="nav-item active">
                                    <a style="color: #3f4754;" class="nav-link" href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a style="color: #3f4754;" class="nav-link dropdown-toggle" href="#"
                                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Offer
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{route('site_data')}}">Data</a>
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{route('site_minute')}}">Minute pack</a>
                                        <a style="color: #3f4754;" class="dropdown-item" href="{{route('site_combo')}}">Combo pack</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #3f4754;" class="nav-link" href="{{route('site_about')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #3f4754;" class="nav-link" href="{{route('site_contact')}}">Contact</a>
                                </li>
                                @auth

                                <li class="nav-item">
                                    <a style="color: #3f4754;" class="nav-link" href="{{route('site_order_history')}}">History</a>
                                </li>
                                @endauth
                                {{-- <li class="nav-item">
                                    <a style="color: #3f4754;" class="nav-link join-seller" href="{{route('site_contact')}}">Join
                                        Seller</a>
                                </li> --}}
                            </ul>
                            <form class="my-2 form-inline my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search">
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ==================== Header Area End ==================== -->
