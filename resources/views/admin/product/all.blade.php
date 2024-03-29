@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Package</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Package</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Package Information</h3>
                    </div>
                    <div class="text-right col-md-7">
                        <a href="{{url('dashboard/package/GrameenPhone')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> GP</a>
                        <a href="{{url('dashboard/package/Banglalink')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> BL</a>
                        <a href="{{url('dashboard/package/Robi')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Robi</a>
                        <a href="{{url('dashboard/package/Airtel')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Airtel</a>
                        <a href="{{url('dashboard/package/Talitalk')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Teletalk</a>

                        <a href="{{url('dashboard/package/add/product')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Add Package</a>
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
                             <strong>Successfully!</strong> delete package information.
                          </div>
                        @endif
                        @if(Session::has('success_publish'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> publish package information.
                          </div>
                        @endif
                        @if(Session::has('success_unpublish'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> unpublish package information.
                          </div>
                        @endif
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> update banner information.
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
                            <table id="alltableinfo" class="table mb-0 table-bordered custom_table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Data</th>
                                        <th>Minute</th>
                                        <th>Operator</th>
                                        <th>Image</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->pd_title}}</td>
                                        <td>{{$data->pd_subtitle}}</td>
                                        <td>{{$data->pd_data}}</td>
                                        <td>{{$data->pd_minute}}</td>
                                        <td>{{$data->pd_operator}}</td>
                                        <td>
                                            @if($data->pd_image!='')
                                                <img class="table_image_ban" src="{{asset('uploads/package/'.$data->pd_image)}}" alt="package"/>
                                            @else
                                                <img class="table_image_ban" src="{{asset('uploads')}}/no-image-big.jpg" alt="package"/>
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->pd_publish==1)
                                                <a href="#" title="publish" id="unpublish" data-toggle="modal" data-target="#unPubModal" data-id="{{$data->pd_id}}"><i class="fa fa-check-square text-success fa-lg"></i></a>
                                            @else
                                                <a href="#" title="unpublish" id="publish" data-toggle="modal" data-target="#publishModal" data-id="{{$data->pd_id}}"><i class="fa fa-pause text-danger fa-lg"></i></a>
                                            @endif
                                            <a href="{{url('dashboard/package/view/'.$data->pd_slug)}}" title="view"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                                            <a href="{{url('dashboard/package/edit/'.$data->pd_slug)}}" title="edit"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
                                            <a href="#" title="delete" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->pd_id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
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
                <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
                <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="#" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{url('dashboard/package/softdelete')}}">
              @csrf
              <div class="mb-0 card">
                <div class="card-header">
                    <h3 class="float-left card-title"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to delete?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="text-right card-footer">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!--Publish Modal Information-->
<div id="publishModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{url('dashboard/package/publish')}}">
              @csrf
              <div class="mb-0 card">
                <div class="card-header">
                    <h3 class="float-left card-title"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to publish package?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="text-right card-footer">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!--Unpublish Modal Information-->
<div id="unPubModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{url('dashboard/package/unpublish')}}">
              @csrf
              <div class="mb-0 card">
                <div class="card-header">
                    <h3 class="float-left card-title"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to unpublish package?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="text-right card-footer">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
