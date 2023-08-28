@extends('layouts.admin')
@section('Number') active @endsection
@section('NumberChild') active @endsection

@section('content')

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Add New Number</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="active">Add New Number</li>
        </ol>
    </div>
</div>

{{-- response massage --}}
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        @if(Session::has('success_store'))
          <div class="alert alert-success alertsuccess" role="alert">
             <strong>Successfully!</strong> Added New Number.
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
    {{-- form part --}}
    <div class="col-lg-12">
      <form class="form-horizontal" id="brandFrom" method="post" action="{{ @$data? route('payment-gateway.update',$data->id): route('payment-gateway.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fab fa-gg-circle"></i> Add New Number</h3>
                    </div>
                    <div class="text-right col-md-4">
                        <a href="{{ route('payment-gateway.index') }}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> Number List</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body card_form">

              <div class="form-group row custom_form_group{{ $errors->has('pg_name') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Name:<span class="req_star">*</span></label>
                  <div class="col-sm-7">
                    <input type="text" placeholder="Input Name" class="form-control" name="pg_name" value="{{@$data? $data->pg_name:old('pg_name')}}" required data-parsley-trigger="keyup">
                    @if ($errors->has('pg_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pg_name') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>

            <div class="form-group row custom_form_group{{ $errors->has('pg_number') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Number:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="text" placeholder="Input Number" class="form-control" name="pg_number" value="{{@$data? $data->pg_number:old('pg_number')}}" required data-parsley-trigger="keyup">
                  @if ($errors->has('pg_number'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('pg_number') }}</strong>
                      </span>
                  @endif
                </div>
            </div>

            <div class="form-group row custom_form_group{{ $errors->has('pg_url') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">URL:<span class="req_star">*</span></label>
                <div class="col-sm-7">
                  <input type="text" placeholder="Input URL" class="form-control" name="pg_url" value="{{@$data? $data->pg_url:old('pg_url')}}" required data-parsley-trigger="keyup">
                  @if ($errors->has('pg_url'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('pg_url') }}</strong>
                      </span>
                  @endif
                </div>
            </div>

            <div class="form-group row custom_form_group{{ $errors->has('logo') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label"> Logo:<span class="req_star">*</span></label>
                <div class="col-sm-3">
                    @php
                        $required = 'required data-parsley-trigger="keyup"';
                    @endphp
                  <input type="file" class="form-control" name="logo"{{ @$data? "": $required}}>
                  @if ($errors->has('logo'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('logo') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-sm-4">
                    <img class="table_image_ban" src="{{asset('uploads/gateway/'.$data->logo)}}" alt="package"/>
                </div>
            </div>

            </div>
            <div class="text-center card-footer card_footer_button">
                <button type="submit" class="btn btn-primary waves-effect">{{ @$data? 'UPDATE': "SAVE" }}</button>
            </div>
        </div>
      </form>
    </div>
    {{-- form part --}}
</div>
@endsection
{{-- form validation activation --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#brandFrom').parsley();
        });
    </script>
@endsection
