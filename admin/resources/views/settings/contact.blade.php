
<!-- Form controls -->
@extends('layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mt-2 mb-2">
            <div class="col-md-8 mx-auto">
                <div class="card mb-6">
                    <h5 class="card-header">Contact Info</h5>
                    @include('widgets.errors')
                    <div class="card-body">
                        <form method="POST" action="{{ route('contactEditPost') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">
                                <label for="contact_phone" class="form-label">Phone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="contact_phone"
                                    id="contact_phone"
                                    value="{{$contactData->contact_phone}}" />

                            </div>
                            <div class="mb-3">
                                <label for="contact_email" class="form-label">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="contact_email"
                                    id="contact_email"
                                    value="{{$contactData->contact_email}}" />
                            </div>







                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
