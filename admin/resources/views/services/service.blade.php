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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>

                                    </thead>
                                    <tbody> @foreach($services as $service)

                                    <tr class="odd">

                                            <td>{{$service->id}}</td>
                                            <td>{{$service->title}}</td>
                                            <td>{!! $service->description !!}</td>
                                            <td><img style="height: 32px; width: auto" src="{{asset($service->image)}}" alt="#"  /></td>
                                            <td>{!! \App\Http\Controllers\generalController\helperController::getStatus($service->status) !!}</td>


                                            <td>
                                                <button onclick="" class="btn btn-outline-info btn-sm">More Info</button>
                                                <button onclick="editService({{$service->id}})" class="btn btn-outline-warning btn-sm">Edit</button>
                                                <button onclick="deleteService({{$service->id}})"   class="btn btn-outline-danger btn-sm">Delete</button>
                                            </td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- / Content -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Service Edit Panel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route("serviceEditPost") }}" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" />
                        @csrf
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactivated</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="title" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <input type="text" class="form-control"  name="description" id="description">
                        </div>
                        <input type="hidden"  id="old_image" name="old_image"/>
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Image:</label>
                            <input type="file" class="form-control"  name="image" id="description">
                        </div>
                        <div class="mb-3">
                            <label  class="col-form-label">Current Image:</label>
                            <div id="current_image"></div>
                        </div>

                        {{--                        <div class="mb-3">--}}
                        {{--                            <label for="message-text" class="col-form-label">:</label>--}}
                        {{--                            <select class="form-control" id="status" name="status">--}}
                        {{--                                <option value="1">{{ __("general.status.active") }}</option>--}}
                        {{--                                <option value="0">{{ __("general.status.deactivate") }}</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
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
    <script src="{{ asset('assets/js/service.js')}}"></script>
@endsection
