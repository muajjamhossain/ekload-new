@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Contact Message</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Contact</a></li>
            <li class="active">View</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Buy Package Message</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/package/buy/unseen')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Contact</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$data->userInfo->name}}</td>
                            </tr>
                            <tr>
                                <td>User Phone</td>
                                <td>:</td>
                                <td>{{$data->userInfo->phone}}</td>
                            </tr>
                            <tr>
                                <td>buy Pac no</td>
                                <td>:</td>
                                <td>0{{$data->pac_phone}}</td>
                            </tr>
                            <tr>
                                <td>Package</td>
                                <td>:</td>
                                <td>{{$data->pacInfo->pd_title}}</td>
                            </tr>
                            <tr>
                                <td>Pac details</td>
                                <td>:</td>
                                <td>{{$data->pacInfo->pd_subtitle}}</td>
                            </tr>
                            <tr>
                                <td>Pac Data</td>
                                <td>:</td>
                                <td>{{$data->pacInfo->pd_data}}</td>
                            </tr>
                            <tr>
                                <td>Pac Min</td>
                                <td>:</td>
                                <td>{{$data->pacInfo->pd_minute}}</td>
                            </tr>
                            <tr>
                                <td>Oparetor</td>
                                <td>:</td>
                                <td>{{$data->pacInfo->pd_operator}}</td>
                            </tr>
                            <tr>
                                <td>Last Number</td>
                                <td>:</td>
                                <td>{{$data->pac_last}}</td>
                            </tr>
                            <tr>
                                <td>Gateway</td>
                                <td>:</td>
                                <td>{{$data->pac_gateway}}</td>
                            </tr>
                            <tr>
                                <td>Buy/Check</td>
                                <td>:</td>
                                @if($data->pacInfo->pd_check!=1)
                                <td>Buy</td>
                                @else
                                <td>Check</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>:</td>
                                <td><img height="300" src="{{asset('uploads/package/'.$data->pacInfo->pd_image)}}"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="{{url('dashboard/contactus/print/'.$data->conus_slug)}}" class="btn btn-secondary waves-effect btnPrint">PRINT</a>
            </div>
        </div>
    </div>
</div>
@endsection
