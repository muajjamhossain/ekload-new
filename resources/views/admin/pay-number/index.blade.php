@extends('layouts.admin')
@section('content')

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">payment-gateway List</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="active">payment-gateway List</li>
        </ol>
    </div>
</div>

{{-- response massage --}}
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        @if(Session::has('success_delete'))
          <div class="alert alert-success alertsuccess" role="alert">
             <strong>Successfully!</strong> Delete payment-gateway information.
          </div>
        @endif

        @if(Session::has('success_update'))
          <div class="alert alert-success alertsuccess" role="alert">
             <strong>Successfully!</strong> Update payment-gateway information.
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
{{-- response massage --}}

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="mr-2 fab fa-gg-circle"></i>payment-gateway List</h3>
                    </div>
                    <div class="text-right col-md-4">
                        <a href="{{ route('payment-gateway.create') }}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="mr-2 fa fa-plus-circle"></i>Add New payment-gateway</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="alltableinfo" class="table mb-0 table-bordered custom_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>DNumber</th>
                                        <th>URL</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th style="text-align:center">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse($all as $item)
                                    <tr>
                                        <td>{{ $item->pg_name }}</td>
                                        <td>{{ $item->pg_number }}</td>
                                        <td>{{ $item->pg_url }}</td>
                                        <td>

                                            @if($item->logo!='')
                                                <img class="table_image_ban" src="{{asset('uploads/gateway/'.$item->logo)}}" alt="gateway"/>
                                            @else
                                                <img class="table_image_ban" src="{{asset('uploads')}}/no-image-big.jpg" alt="banner"/>
                                            @endif

                                        </td>
                                        <td>{{ $item->status == 0 ? 'InActive' : 'Active' }}</td>
                                        <td>
                                            <div class="action_section">

                                            @if($item->status==1)
                                                <a href="#" title="publish" id="unpublish" data-toggle="modal" data-target="#unPubModal" data-id="{{$item->id}}"><i class="fa fa-check-square text-success fa-lg"></i></a>
                                            @else
                                                <a href="#" title="unpublish" id="publish" data-toggle="modal" data-target="#publishModal" data-id="{{$item->id}}"><i class="fa fa-pause text-danger fa-lg"></i></a>
                                            @endif
                                              <a href="{{ route('payment-gateway.edit',$item->id) }}" title="edit"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
                                              <a href="{{ route('payment-gateway.delete',$item->id) }}" title="delete" id="delete"><i class="fas fa-trash-alt fa-lg delete_icon"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                  @empty
                                      <p class="data_not_found">Data Not Found</p>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{route('payment-gateway.softdelete')}}">
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
            <form method="post" action="{{route('payment-gateway.publish')}}">
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
            <form method="post" action="{{route('payment-gateway.unpublish')}}">
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
