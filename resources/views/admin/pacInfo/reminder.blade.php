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
                        @if(Session::has('success'))
                        <div class="alert alert-success alertsuccess" role="alert">
                            <strong>Successfully!</strong> send reminder message information.
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
                                        <th>মোবাইল নাম্বার</th>
                                        <th>অফার নাম্বার</th>
                                        <th>অপারেটর</th>
                                        <th>রেগুলার মূল্য</th>
                                        <th>অফার মূল্য</th>
                                        <th>পেমেন্ট মাধ্যম</th>
                                        <th>তারিখ ও সময়</th>
                                        <th>রিমাইন্ডার পাঠান</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reminders as $data)
                                    <tr>
                                        <td>{{ $data->userInfo->phone ?? 'Gest User' }}</td>
                                        <td>{{$data->pac_phone}} </td>
                                        <td>{{$data->pacInfo->pd_operator}}</td>
                                        <td>{{$data->pac_regular}}</td>
                                        <td>{{$data->pac_offer}}</td>
                                        <td>{{$data->pac_gateway}}</td>
                                        <td>{{date('d-M-y h-i-a',strtotime($data->created_at))}}</td>
                                        <td>
                                              <a href="#" title="reminder" id="reminderId" data-toggle="modal" data-target="#reminderModal" data-id="{{$data->pac_id}}"> <span style="font-size: 25px; text-align: center ">📢</span>
                                              </a>
                                          </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--Reminder Modal Information-->
<div id="reminderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/package/buy/reminder')}}">
            @csrf
            <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Reminder Message</h3>
                </div>
                <div class="card-body modal_card">
                    Are you sure you want to Send Reminder?
                    <input type="hidden" id="modal_id" name="reminderId">
                    <div class="mb-3">
                    <textarea class="form-control" name="reminder" rows="3">আপনার প্যাকেজের মেয়াদ শেষ হতে ৭ দিনের কম সময় বাকি আছে। কম টাকায় অফার পেতে এবং পূর্বের মিনিট ও ডাটা রাখতে চাইলে এখন থেকেই চোখ রাখুন Ekload.com এ। 🥰</textarea>
                    </div>
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




@endsection


@push('customScripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
<script>
       $(document).ready(function() {
        $(document).on("click", "#reminderId", function () {
            var reminderId = $(this).data('id');
            $(".modal_card #modal_id").val( reminderId );
        });
       });
</script>
@endpush
