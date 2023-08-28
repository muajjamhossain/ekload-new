@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Page Content</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Page</a></li>
            <li><a href="#">Content</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/page/content/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Page Content</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/page/content')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Page Content</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> update page content information.
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
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Page:</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="id" value="{{$data->pc_id}}"/>
                      <input type="hidden" name="slug" value="{{$data->pc_slug}}"/>
                      <input type="text" class="form-control" name="title" value="{{$data->page->page_name}}" disabled>
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="title" value="{{$data->pc_title}}">
                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Subtitle:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="subtitle" value="{{$data->pc_subtitle}}">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Details:</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="8" id="" name="details">{{$data->pc_details}}</textarea>
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Photo:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="pic" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        <img class="img-thumbnail" src="{{ asset('uploads/page-content/'.$data->pc_photo) }}"/>
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
