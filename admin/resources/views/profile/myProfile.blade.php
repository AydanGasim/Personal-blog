@extends('layouts.master')
@section('title',"Profile")
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mt-2 mb-2">
            <div class="col-md-8 mx-auto">
                <div class="card mb-6">
                    <h5 class="card-header">Update Your Password</h5>
                    @include('widgets.errors')
                    <div class="card-body">
                        <form method="POST" action="{{route('updatePassword')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label  for="current_password" class="form-label">Current Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="old_password"
                                    id="current_password"/>

                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Enter Your New Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="new_password"
                                    id="new_password"/>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-pass" class="form-label">Confirm Your New Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="new_password_confirmation"
                                    id="confirm-pass"
{{--                                    value="{{ old('confirm-pass') }}"--}}
                                />
                            </div>

                            <button class="btn btn-primary">Update</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('assets/js/profile.js')}}"></script>

@endsection
