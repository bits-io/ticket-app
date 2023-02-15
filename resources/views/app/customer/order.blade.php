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

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="card col-md-6">
                        <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <input type="hidden" class="form-control" value="{{$data->id}}" name="concert_id" required>
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="number" class="form-control"  placeholder="Enter NIK" name="nik" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="text" class="form-control"  placeholder="Enter Fullname" name="full_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Birth Date</label>
                                <input type="date" class="form-control"  placeholder="Enter Birth Date" name="birth_date" required>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control"  placeholder="Enter Phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control"  placeholder="Enter Address" name="address" required>
                            </div>


                            <div class="form-group justify-content-end">
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
