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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-left">
                                    <h4 class="card-title">Data Table</h4>
                                </div>
                                <div class="header-right">

                                </div>
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 246.067px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ticket Code</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 246.067px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 385.917px;" aria-label="Position: activate to sort column ascending">Concert ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 385.917px;" aria-label="Position: activate to sort column ascending">Order ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 169.717px;" aria-label="Start date: activate to sort column ascending">Status</th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($data as $d)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $d->ticket_code }}</td>
                                                            <td class="sorting_1">{{ $d->customer_id }}</td>
                                                            <td class="sorting_1">{{ $d->concert_id }}</td>
                                                            <td class="sorting_1">{{ $d->transaction_id }}</td>
                                                            <td class="sorting_1">{{ $d->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- Modal Add --}}
                                        <div class="modal fade" id="modalAdd">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('admin.ticket.create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Name</label>
                                                                <input type="text" class="form-control"  placeholder="Enter name" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Address</label>
                                                                <input type="text" class="form-control"  placeholder="Enter address" name="address" required>
                                                            </div>


                                                            <div class="form-group justify-content-end">
                                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
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
