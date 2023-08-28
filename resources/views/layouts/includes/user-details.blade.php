 <div class="user-details">
    <div class="pull-left">
        <img src="{{ asset('assets/admin') }}/assets/images/users/avatar-1.jpg" alt=""
            class="thumb-md rounded-circle">
    </div>
    <div class="user-info">
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('dashboard/profile') }}" class="dropdown-item"><i
                            class="mr-2 md md-face-unlock"></i> Profile<div class="ripple-wrapper">
                        </div></a></li>
                <li><a href="javascript:void(0)" class="dropdown-item"><i
                            class="mr-2 md md-settings"></i> Settings</a></li>
                <li><a href="javascript:void(0)" class="dropdown-item"><i
                            class="mr-2 md md-lock"></i> Lock screen</a></li>
                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="dropdown-item"><i class="mr-2 md md-settings-power"></i> Logout</a>
                </li>
            </ul>
        </div>
        <p class="m-0 text-muted">{{ '@' . Auth::user()->username }}</p>
    </div>
</div>
