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
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('admin.concert.update', $data->id) }}"enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" value="{{$data->name}}"  placeholder="Enter name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Start Time</label>
                                        <input type="datetime-local" class="form-control" value="{{$data->start_time}}" placeholder="Enter start time" name="start_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Place</label>
                                        <input type="text" class="form-control" value="{{$data->place}}" placeholder="Enter place" name="place" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Quota</label>
                                        <input type="number" class="form-control" value="{{$data->quota}}" placeholder="Enter quota" name="quota" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number" class="form-control" value="{{$data->price}}" placeholder="Enter price" name="price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control"value="{{$data->image}}"  placeholder="Enter image" name="image" required>
                                    </div>

                                    <div class="form-group justify-content-end">
                                        <a href="{{route('admin.concert')}}" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
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
