<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    @include('layouts.preloader')
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('layouts.nav-header')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('layouts.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('admin.verify-transaction.update', $data->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Customer Id</label>
                                        <input type="text" class="form-control "  value="{{$data->customer_id}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Transaction Id</label>
                                        <input type="text" class="form-control" value="{{$data->transaction_id}}"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <img src="{{ asset($data->image) }}" height="100" alt="" srcset="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="{{$data->status}}">{{$data->status}}</option>
                                            <option value="accept">Accept</option>
                                            <option value="reject">Reject</option>
                                        </select>
                                    </div>

                                    <div class="form-group justify-content-end">
                                        <a href="{{route('admin.verify-transaction')}}" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('layouts.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('layouts.footer-script')

</body>

</html>
