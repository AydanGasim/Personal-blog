<!-- Form controls -->
@extends('layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mt-2 mb-2">
            <div class="col-md-8 mx-auto">
                <div class="card mb-6">
                    <h5 class="card-header">Site Info</h5>
                    @include('widgets.errors')
                    <div class="card-body">
                        <form method="POST" action="{{ route('social') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">
                                <label for="social_facebook" class="form-label">Facebook</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    name="social_facebook"
                                    id="social_facebook"
                                    value="{{$socialData->social_facebook}}" />

                            </div>
                            <div class="mb-3">
                                <label for="social_instagram" class="form-label">Instagram</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    name="social_instagram"
                                    id="social_instagram"
                                    value="{{$socialData->social_instagram}}" />
                            </div>
                            <div class="mb-3">
                                <label for="social_github" class="form-label">Github</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    name="social_github"
                                    id="social_github"
                                    value="{{$socialData->social_github}}" />
                            </div>
                            <div class="mb-3">
                                <label for="social_linkedin" class="form-label">Linkedin</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    name="social_linkedin"
                                    id="social_linkedin"
                                    value="{{$socialData->social_linkedin}}" />
                            </div>






                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
