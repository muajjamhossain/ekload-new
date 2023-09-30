@extends('layouts/website')

@section('content')

@push('websiteCustomCss')
<Style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
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

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
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
                <li class="breadcrumb-item active" aria-current="page">Reminder</li>
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

            <div class="col-md-12">

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="text-center">নোটিফিকেশন</h6>
                                        <div class="table-responsive">
                                            <table id="alltableinfo" class="table table-bordered custom_table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">বিস্তারিত</th>
                                                        <th>তারিখ ও সময়</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @forelse ($reminder as $key => $data)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $data->reminder }}</td>
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

    </div>
</div>
@endsection
