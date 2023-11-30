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
                        <form method="POST" action="{{ route('siteInfoEditPost') }}" enctype="multipart/form-data">
                            <input type="hidden" name="old_logo" value="{{ $siteInfoData->logo }}"/>
                            <input type="hidden" name="old_favicon" value="{{ $siteInfoData->favicon }}"/>
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    id="title"
                                value="{{$siteInfoData->title}}" />

                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="description"
                                    id="description"
                                value="{{$siteInfoData->description}}" />
                            </div>
                            <div class="mb-3">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="keyword"
                                    id="keyword"
                                    value="{{$siteInfoData->keyword}}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="logo">Logo</label> <br />
                                <img src="{{ asset($siteInfoData->logo) }}" style="height: 150px; width: auto" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="logo">Update Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="favicon">Favicon</label>  <br />
                                <img src="{{ asset($siteInfoData->favicon) }}" style="height: 150px; width: auto" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="favicon">Update favicon</label>
                                <input type="file" class="form-control" name="favicon" id="favicon" />
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
