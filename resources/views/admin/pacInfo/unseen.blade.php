@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Contact Message</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Contact Us</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Buy Pac Msg</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/contactus')}}"
                            class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i>
                            Demo</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success_soft'))
                        <div class="alert alert-success alertsuccess" role="alert">
                            <strong>Successfully!</strong> delete contact message information.
                        </div>
                        @endif
                        @if(Session::has('success_unpub'))
                        <div class="alert alert-success alertsuccess" role="alert">
                            <strong>Successfully!</strong> Unread contact message information.
                        </div>
                        @endif
                        @if(Session::has('success_pub'))
                        <div class="alert alert-success alertsuccess" role="alert">
                            <strong>Successfully!</strong> Read contact message information.
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <div class="alert alert-warning alerterror" role="alert">
                            <strong>Opps!</strong> please try again.
                        </div>
                        @endif
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="alltableinfo" class="table table-bordered custom_table mb-0">
                                <thead>
                                    <tr>
                                        {{-- <th>Name</th>
                                        <th>User Phone</th> --}}
                                        {{-- <th>buy Pac no</th>
                                        <th>Oparetor</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>gateway</th>
                                        <th>Check</th> --}}
                                        <th>Tranjection</th>
                                        <th>All Data</th>
                                        <th>Time</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        {{-- <td>{{$data->userInfo->name?? 'Guest User'}}</td>
                                        <td>{{$data->userInfo->phone?? 'N/A'}}</td>
                                        <td>
                                            @if($data->pacInfo->pd_operator=='GrameenPhone')
                                            *222*0{{$data->pac_phone}}#
                                            @else

                                            @endif

                                            @if($data->pacInfo->pd_operator=='Banglalink')
                                            *123*0{{$data->pac_phone}}#
                                            @else

                                            @endif


                                            @if($data->pacInfo->pd_operator=='Robi')
                                            *333*0{{$data->pac_phone}}#
                                            @else

                                            @endif


                                            @if($data->pacInfo->pd_operator=='Airtel')
                                            *111*0{{$data->pac_phone}}#
                                            @else

                                            @endif


                                            @if($data->pacInfo->pd_operator=='Talitalk')
                                            *152*0{{$data->pac_phone}}#
                                            @else

                                            @endif
                                        </td>
                                        <td>{{$data->pacInfo->pd_operator}}</td>
                                        <td>{{$data->pacInfo->pd_title}}</td>
                                        <td>{{$data->pacInfo->pd_regular}}</td>
                                        <td>{{$data->pac_gateway}}</td>
                                        @if($data->pacInfo->pd_check!=1)
                                        <td>Buy</td>
                                        @else
                                        <td>Check</td>
                                        @endif --}}
                                        <td>{{ $data->tr_status }}</td>
                                        <td><span class="badge bg-secondary" id="p1">{{ $data->pacDetails }}</span></td>
                                        <td>{{date('h-i-a',strtotime($data->created_at))}}</td>
                                        <td>
                                            <button class="border-0" onclick="copyToClipboard('#p1')"><i
                                                    class="fa fa-clipboard text-success fa-lg border-0"></i></button>
                                            @if($data->pac_publish==1)
                                            <a href="#" title="Uncomplite" id="unpublish" data-toggle="modal"
                                                data-target="#unPubModal" data-id="{{$data->pac_id}}"><i
                                                    class="fa fa-check-square text-success fa-lg"></i></a>
                                            @else
                                            <a href="#" title="Complite" id="publish" data-toggle="modal"
                                                data-target="#publishModal" data-id="{{$data->pac_id}}"><i
                                                    class="fa fa-pause text-danger fa-lg"></i></a>
                                            @endif
                                            {{-- <a href="{{url('dashboard/package/buy/view/'.$data->pac_slug)}}"
                                                title="view"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                                            <a href="#" title="delete" id="softDelete" data-toggle="modal"
                                                data-target="#softDelModal" data-id="{{$data->pac_id}}"><i
                                                    class="fa fa-trash fa-lg delete_icon"></i></a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="{{url('dashboard/package/buy/allprint')}}"
                    class="btn btn-secondary waves-effect btnPrint">PRINT</a>
                <a href="{{url('dashboard/package/buy/excel')}}" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="{{url('dashboard/package/buy/pdf')}}" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/package/buy/softdelete')}}" />
            @csrf
            <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                    Are you sure you want to delete?
                    <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!--Publish Modal Information-->
<div id="publishModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/package/buy/publish')}}">
                @csrf
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                    </div>
                    <div class="card-body modal_card">
                        Are you sure you want to complite Message?
                        <input type="hidden" id="modal_id" name="modal_id">
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                        <button type="button" class="btn btn-sm btn-danger waves-effect"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Unpublish Modal Information-->
<div id="unPubModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/package/buy/unpublish')}}">
                @csrf
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                    </div>
                    <div class="card-body modal_card">
                        Are you sure you want to Uncomplite Message?
                        <input type="hidden" id="modal_id" name="modal_id">
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                        <button type="button" class="btn btn-sm btn-danger waves-effect"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('customScripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
<script>
        function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        }
</script>
@endpush
