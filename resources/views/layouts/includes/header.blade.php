<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ url('dashboard') }}" class="logo"><i class="md md-terrain"></i>
                <span>EKLOAD</span></a>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="mb-0 list-inline menu-left">
                <li class="float-left">
                    <a href="#" class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="float-left hide-phone">
                    <form role="search" class="navbar-form">
                        <input type="text" placeholder="Type here for search..."
                            class="form-control search-bar">
                        <a href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

            <ul class="float-right nav navbar-right list-inline">
                <li class="d-none d-sm-block">
                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                </li>
                <li class="dropdown d-none d-sm-block">
                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                        @php
                        //   $all=App\Contactus::where('conus_status',1)->where('conus_publish',0)->orderBy('conus_id','DESC')->count();
                        //   $allpac=App\PacInfo::where('pac_status',1)->where('pac_publish',0)->orderBy('pac_id','DESC')->count();
                            $allpac = 1;
                        @endphp
                          <i class="md md-notifications"></i>
                            <div id="notification">

                            </div>
                      </a>
                    <ul class="dropdown-menu dropdown-menu-lg">
                        <li class="text-center notifi-title" id="audio">Notification</li>
                        <li class="list-group">
                           <!-- list item-->
                            <a href="javascript:void(0);" class="list-group-item">
                              <div class="media">
                                 <div class="pr-2 media-left">
                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                 </div>
                                 <div class="clearfix media-body">
                                    <div class="media-heading">New user registered</div>
                                    <p class="m-0">
                                       <small>
                                         @if($allpac!= NULL)
                                         You have <a href="{{url('dashboard/package/buy/unseen')}}"><strong>{{$allpac}}</strong></a> unread messages
                                       </small>
                                        @else
                                         You have no messages</small>
                                          @endif
                                     </p>
                                 </div>
                              </div>
                            </a>
                           <a href="javascript:void(0);" class="list-group-item">
                            <small> <a href="{{url('dashboard/package/buy/all')}}">See all notifications</a></small>
                          </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown open">
                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                      @if(@Auth::user()->photo!='')
                          <img class="rounded-circle" src="{{asset('uploads/users/'.@Auth::user()->photo)}}" alt="user-photo"/>
                      @else
                          <img class="rounded-circle" src="{{ asset('assets/admin') }}/assets/images/users/avatar-1.jpg" alt="user-photo"/> </a>
                      @endif
                    <ul class="dropdown-menu">
                        <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="mr-2 md md-face-unlock"></i> Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url('/clear-cache')}}"><i class="mr-1 mr-2 align-middle md md-face-unlock font-size-16"></i> <span>Clear-Cache</span></a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mr-2 md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i class="mr-2 md md-lock"></i> Lock screen</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="mr-2 md md-settings-power"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>

@push('customScripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Select all data
        function allData(){
            $.ajax({
                type:"GET",
                dataType:"json",
                url:"{{url('dashboard/contactus/notification')}}",
                success:function(response){
                    var data="";
                    data='<span class="badge badge-pill badge-xs badge-danger">'+response+'</span>';

                    $('#notification').html(data.unreadContact);
                }
            });
        }

        allData();

        window.setInterval(allData, 5000);

        function playButton(){
            document.getElementById('audio').src="music.mp3";
        }
        playButton();
    </script>
@endpush
