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
                        <div class="card-body">
                            <h4 class="card-title">Invoice</h4>
                            <div class="basic-list-group">
                                <ul class="list-group">
                                    <li class="list-group-item">Order Code : {{$transaction->order_code}}</li>
                                    <li class="list-group-item">Concert : {{$transaction->concert_id}}</li>
                                    <li class="list-group-item">Customer Name : {{$transaction->customer_id}}</li>
                                    <li class="list-group-item">Total Order : {{$transaction->amount}}</li>
                                    <li class="list-group-item">Status : <strong>{{$transaction->status}}</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Payment Now</h4>
                            <div class="basic-list-group">
                                <ul class="list-group">
                                    <li class="list-group-item">Gopay : +628123123123</li>
                                    <li class="list-group-item">BNI : 3122341000101</li>
                                    @if($transaction)
                                        <li class="list-group-item">Status : {{$verify->status}}</li>
                                    @else
                                        <form action="{{route('verify.payment', $transaction->order_code)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="image" class="form-control" required>
                                            <button class="btn btn-primary" type="submit">Verify</button>
                                        </form>
                                    @endif

                                </ul>
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
