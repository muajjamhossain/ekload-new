@extends('layouts/website')

@section('content')

@push('websiteCustomCss')
<Style>
    body{
        margin-top:20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }
    .main-body {
        padding: 15px;
    }
    .card {
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col, .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }
    .mb-3, .my-3 {
        margin-bottom: 1rem!important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }
    .h-100 {
        height: 100%!important;
    }
    .shadow-none {
        box-shadow: none!important;
    }
</Style>
@endpush

<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">History</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->


          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                @if(Session::has('success'))
                  <div class="alert alert-success alertsuccess" role="alert">
                     <strong>Successfully!</strong> Update done.
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

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> --}}

                    @if(Auth::user()->photo!='')
                        <img src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="Admin" class="rounded-circle" width="150">
                    @else
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    @endif
                    <div class="mt-3">
                      <h4>{{ Auth::user()->name }}</h4>
                      <p class="text-secondary mb-1">Active</p>
                      <p class="text-muted font-size-sm">Regular Customer</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">

              <div class="row">
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-body">
                            <h4 class="text-center text-danger">রিচার্জ হিস্টরি</h4>
                            <div class="table-responsive">
                                <table id="alltableinfo" class="table table-bordered custom_table mb-0">
                                    <thead>
                                        <tr>
                                            <th>মোবাইল নাম্বার  </th>
                                            <th>অপারেটর</th>
                                            <th>রেগুলার মূল্য</th>
                                            <th>অফার মূল্য</th>
                                            <th>পেমেন্ট মাধ্যম</th>
                                            <th>তারিখ ও সময়</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($histories as $key => $data)
                                        <tr>
                                            <td>{{$data->pac_phone}} </td>
                                            <td>{{$data->pacInfo->pd_operator}}</td>
                                            <td>{{$data->pac_regular}}</td>
                                            <td>{{$data->pac_offer}}</td>
                                            <td>{{$data->pac_gateway}}</td>
                                            <td>{{date('d-M-y h-i-a',strtotime($data->created_at))}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Not Found</td>
                                        </tr>
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

        </div>
    </div>
@endsection
