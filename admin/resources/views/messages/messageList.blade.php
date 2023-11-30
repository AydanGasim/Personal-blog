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
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Reason</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>View</th>

                                    </tr>

                                    </thead>
                                    <tbody> @foreach($messages as $message)

                                        <tr class="odd">

                                            <td>{{$message->id}}</td>
                                            <td>{{$message->full_name}}</td>
                                            <td>{{$message->email }}</td>
                                            <td>{!! \App\Http\Controllers\generalController\helperController::getReason($message->reason) !!}</td>
                                            <td>{{  mb_substr($message->message,0,20)  }}...</td>
                                            <td>{!! \App\Http\Controllers\generalController\helperController::getStatusMessage($message->status) !!}</td>
                                            <td>
                                                <button onclick="updateMessage({{$message->id}})" class="btn btn-outline-warning btn-sm">View</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Edit Panel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('messageUpdatePost') }}">
                        <input type="hidden" name="id" id="id" />
                        @csrf
                        <div class="mb-3">
                            <label for="full_name" class="col-form-label">Name:</label>
                            <input disabled type="text" class="form-control" name="full_name" id="full_name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input  disabled type="email" class="form-control" name="email" id="email">

                        </div>
                        <div class="mb-3">
                            <label for="reason" class="col-form-label">Reason:</label>
                            <input disabled  type="text" class="form-control" name="reason" id="reason">

                        </div>
                        <div class="mb-3">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea disabled type="text" class="form-control" name="message" id="message"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1">Answered</option>
                                <option value="0">Unanswered</option>
                            </select>
                        </div>
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
    <script src="{{ asset('assets/js/messages.js')}}"></script>
@endsection
