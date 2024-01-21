@extends('layouts.master')

@section('content')


    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                @include('widgets.errors')
                                <table id="example" class="table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="example_info">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Read Count</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($portfolios as $portfolio)
                                    <tr class="odd">

                                            <td>{{$portfolio->id}}</td>
                                            <td>{{ \App\Http\Controllers\generalController\helperController::getPortfolioCategoryName($portfolio->category_id) }}</td>
                                            <td><img style="width: 64px; height: 32px" src="{{ asset($portfolio->image) }}" alt="#"  /></td>
                                            <td>{{$portfolio->title}}</td>
                                            <td>{{$portfolio->read_count}}</td>
                                            <td>{!! \App\Http\Controllers\generalController\helperController::getStatus($portfolio->status) !!}</td>
                                          <td>
                                                <button onclick="" class="btn btn-outline-info btn-sm">More Info</button>
                                                <a href="{{ route('portfolioEditView',$portfolio->id) }}"><button  class="btn btn-outline-warning btn-sm">Edit</button></a>
                                                <button onclick="deletePortfolio({{$portfolio->id}})"   class="btn btn-outline-danger btn-sm">Delete</button>

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
        <!-- / Content -->
    </div>


@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

@endsection

@section("js")
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/tables-datatables-basic.js')}}"></script>
    <script src="{{ asset('assets/js/portfolio.js')}}"></script>
@endsection

