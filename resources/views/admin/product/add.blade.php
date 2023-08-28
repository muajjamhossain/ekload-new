@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">
              @if(@$data)
              Edit
              @else
              Add
              @endif
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{ @$data ? url('dashboard/package/update') : url('dashboard/package/submit') }}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i>
                          @if(@$data)
                          Edit Product Information
                          @else
                          Add Product Information
                          @endif
                           </h3>
                      </div>
                      <div class="text-right col-md-4">
                        @if(Auth::user()->role_id<=2)
                          <a href="{{url('dashboard/package')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Package</a>
                        @else
                          <a href="{{url('dashboard/package/my')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> My Package</a>
                        @endif
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
                             <strong>Successfully!</strong> upload product information.
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
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group row custom_form_group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Title:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="title" value="{{ @$data ? @$data->pd_title: old('title')}}">
                          @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('title') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('minute') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Minute:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="minute" value="{{ @$data ? @$data->pd_minute: old('minute')}}">

                          <input type="hidden" name="id" value="{{ @$data ? @$data->pd_id: "" }}">
                          <input type="hidden" name="slug" value="{{ @$data ? @$data->pd_slug: ""}}">
                          @if ($errors->has('minute'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('minute') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('regular') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">regular Price:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="regular" value="{{ @$data ? @$data->pd_regular: old('regular')}}">
                          @if ($errors->has('regular'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('regular') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('operator') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">operator Name:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" name="operator">
                            <option value="">Select operator Name</option>
                            <option value="GrameenPhone" {{ @$data ? (@$data->pd_operator == "GrameenPhone"? "selected": ""): ""}}>GrameenPhone</option>
                            <option value="Banglalink" {{ @$data ? (@$data->pd_operator == "Banglalink"? "selected": ""): ""}}>Banglalink</option>
                            <option value="Robi" {{ @$data ? (@$data->pd_operator == "Robi"? "selected": ""): ""}}>Robi</option>
                            <option value="Airtel" {{ @$data ? (@$data->pd_operator == "Airtel"? "selected": ""): ""}}>Airtel</option>
                            <option value="Talitalk" {{ @$data ? (@$data->pd_operator == "Talitalk"? "selected": ""): ""}}>Talitalk</option>
                          </select>
                          @if ($errors->has('operator'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('operator') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                     <div class="form-group row custom_form_group{{ $errors->has('point') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Point:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="point" value="{{ @$data ? @$data->pd_point: old('point')}}">
                          @if ($errors->has('point'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('point') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('validity') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">validity:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="validity" value="{{ @$data ? @$data->pd_validity: old('validity')}}">
                          @if ($errors->has('validity'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('validity') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    @if(@$data)
                        <div class="form-group row custom_form_group">
                            <label class="col-sm-3 control-label">Product Image:</label>
                            <div class="col-sm-7">
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
                        </div>
                    @else
                        <div class="form-group row custom_form_group{{ $errors->has('pic') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label">Product Image:<span class="req_star">*</span></label>
                            <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file btnu_browse">
                                        Browse… <input type="file" name="pic" id="imgInp">
                                    </span>
                                </span>
                                <input type="text" class="form-control" readonly>
                            </div>
                            @if ($errors->has('pic'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pic') }}</strong>
                                </span>
                            @endif
                            <img id='img-upload'/>
                            </div>
                        </div>

                    @endif

                  </div>

                  <div class="col-md-6 col-sm-6">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label">Details:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="details" value="{{ @$data ? @$data->pd_subtitle: old('details')}}">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('data') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Data:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="data" value="{{ @$data ? @$data->pd_data: old('data')}}">
                          @if ($errors->has('data'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('data') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('offer') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Offer Price:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="offer" value="{{ @$data ? @$data->pd_offer: old('offer')}}">
                          @if ($errors->has('offer'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('offer') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('offer_type') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Offer Type:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" name="offer_type">
                            <option value="">Select Offer Type</option>
                            <option value="Data-Pack" {{ @$data ? (@$data->pd_type == "Data-Pack"? "selected": ""): (old('offer_type') == "Data-Pack"? "selected": "")}}>Data Pack</option>
                            <option value="Minute-Pack" {{ @$data ? (@$data->pd_type == "Minute-Pack"? "selected": ""): (old('offer_type') == "Data-Pack"? "selected": "")}}>Minute Pack</option>
                            <option value="Combo-Pack" {{ @$data ? (@$data->pd_type == "Combo-Pack"? "selected": ""): (old('offer_type') == "Data-Pack"? "selected": "")}}>Combo Pack</option>
                          </select>
                          @if ($errors->has('offer_type'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('offer_type') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('reward') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Reward:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="reward" value="{{ @$data ? @$data->pd_reward: old('reward')}}">
                          @if ($errors->has('reward'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('reward') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label">Number Check:</span></label>
                        <div class="col-sm-7">
                          <input type="checkbox" class="form-control" name="check" value="{{ @$data ? @$data->pd_check: old('check')}}" {{@$data->pd_check==1 ? 'checked': ''}}>
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label">Coupon Enable:</span></label>
                        <div class="col-sm-7">
                          <input type="checkbox" class="form-control" id="couponAnable" name="coupon" value="{{ @$data ? @$data->pd_coupon: old('coupon')}}" {{@$data->pd_coupon==1 ? 'checked': ''}}>
                        </div>
                    </div>

                    <div class="form-group row custom_form_group {{ $errors->has('coupon_id') ? ' has-error' : '' }} d-none" id="coupon_id">
                        <label class="col-sm-3 control-label">Select:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" name="coupon_id">
                            <option>Select Coupon</option>
                            @foreach($coupons as $coupon)
                                <option value="{{ $coupon->id }}" {{ @$data ? (@$data->coupon_id == $coupon->id? "selected": ""): ""}}>{{ $coupon->coupon_name }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('coupon_id'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('coupon_id') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                  </div>
                </div>

              </div>
              <div class="text-center card-footer card_footer_button">
                  <button type="submit" class="btn btn-primary waves-effect">{{ @$data ? "UPDATE" : "UPLOAD" }}</button>
              </div>
          </div>
        </form>
    </div>
</div>

@push('customScripts')
<script>
    $(document).ready(function() {
        $('#couponAnable').on('change', function() {
            $('#coupon_id').toggleClass('d-none');
        });


        $('#availableCoupon').click(function() {
            $('#availableCoupon').addClass('d-none');
            $('#applyCoupon').removeClass('d-none');
            $('#couponCode').removeClass('d-none');
            $("#coupon").attr('required',true);
        })

        $('#applyCoupon').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('applyCoupon') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "_token": "{{ csrf_token() }}",
                    coupon: $("#coupon").val(),
                    paybleRate: $("#paybleRate").text(),
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        $('#availableCoupon').removeClass('d-none');
                        $('#applyCoupon').addClass('d-none');
                        $('#couponCode').addClass('d-none');
                        $("#coupon").attr('required',false);
                    }
                    $("#paybleRate").text(data.amount);
                    $("#paybleAmount").val(data.amount);
                    $("#message").text(data.message).css({'color':'red'});
                }
            });
        });


    })
</script>
@endpush
@endsection
