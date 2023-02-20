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

            <div class="container-fluid mt-3">
                <div class="row">
                    @foreach ($concert as $concert)
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="card-title">{{$concert->name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$concert->place}}</h6>
                                </div>
                                <img class="img-fluid" src="{{$concert->image}}" alt="">
                                <div class="card-body">
                                    <p class="card-text">Only Rp{{$concert->price}}.</p>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text d-inline">
                                        <small class="text-muted">Last updated {{$concert->created_at}}</small>
                                    </p>
                                    <a href="{{ route('order.show', $concert->id) }}" class="btn btn-primary float-right">Buy</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
