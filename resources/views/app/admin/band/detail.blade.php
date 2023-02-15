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
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('admin.band-playing.update', $data->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <select name="band_id">
                                            <option value="{{ $data->band_id}}">{{$data->band_name}}</option>
                                            <option value="{{ $data->concert_id}}">{{$data->concert_name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" value="{{$data->address}}" name="address" required>
                                    </div>

                                    <div class="form-group justify-content-end">
                                        <a href="{{route('admin.band-playing')}}" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
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
