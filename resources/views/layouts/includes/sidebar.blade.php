<div id="sidebar-menu">
    <ul>
        <li><a href="{{ url('dashboard') }}" class="waves-effect"><i class="md md-home"></i><span>Dashboard </span></a></li>
        <li><a href="{{url('dashboard/package/buy/unseen')}}" class="waves-effect"><i class="md md-contacts"></i><span>Unseen Buy Pac msg</span></a></li>
        <li><a href="{{url('dashboard/package/buy/all')}}" class="waves-effect"><i class="md md-contacts"></i><span>All Buy Pac msg </span></a></li>
        <li><a href="{{url('dashboard/package')}}" class="waves-effect"><i class="md md-local-attraction"></i><span>Package</span></a></li>
        <li><a href="{{url('dashboard/package/add/product')}}" class="waves-effect"><i class="md md-local-attraction"></i><span>Add Package</span></a></li>
        <li><a href="{{url('dashboard/package/buy/reminder')}}" class="waves-effect"><i class="md md-contacts"></i><span>Reminder</span></a></li>

        <li><a href="{{url('dashboard/contactus/unseen')}}" class="waves-effect"><i class="md md-contacts"></i><span>Unseen Con Msg </span></a></li>
        <li><a href="{{url('dashboard/contactus')}}" class="waves-effect"><i class="md md-contacts"></i><span>All Con Msg </span></a></li>

        <li><a href="{{ url('dashboard/user') }}" class="waves-effect"><i class="md md-account-circle"></i><span>Users </span></a></li>
        <li><a href="#" class="waves-effect"><i class="md md-view-list"></i><span>Menu </span></a></li>
        <li><a href="{{ url('dashboard/banner') }}" class="waves-effect"><i class="md md-panorama"></i><span>Banner </span></a></li>

        <li class="has_sub">
            <a href="#" class="waves-effect"><i class="md md-settings"></i><span>Manage Website</span><span class="pull-right"><i class="md md-add"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="{{ url('dashboard/manage/basic') }}">Basic Information</a></li>
                <li><a href="{{ url('dashboard/manage/social') }}">Social Media</a></li>
                <li><a href="{{ url('dashboard/page/content') }}">All Page Content</a></li>
                <li><a href="{{ url('dashboard/manage/contact') }}">Contact Information</a></li>
                <li><a href="{{ url('dashboard/manage/copyright') }}">Copyright</a></li>
            </ul>
        </li>

        <li><a href="{{ url('dashboard/contactus') }}" class="waves-effect"><i class="md md-contacts"></i><span>Contact Message </span></a></li>

        <li><a href="{{ route('coupon.index') }}" class="waves-effect"><i class="md md-delete"></i><span>Coupon</span></a></li>
        <li><a href="{{ route('payment-gateway.index') }}" class="waves-effect"><i class="md md-delete"></i><span>payment-gateway</span></a></li>

        <li><a href="{{ url('dashboard/recycle') }}" class="waves-effect"><i class="md md-delete"></i><span>Recycle Bin </span></a></li>

        <li><a href="{{ url('/') }}" class="waves-effect" target="_blank"><i class="md md-public"></i><span>Live Site </span></a></li>
        <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="waves-effect"><i class="md md-settings-power"></i><span>Logout</span></a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            style="display: none;">
            @csrf
        </form>
    </ul>
    <div class="clearfix"></div>
</div>
