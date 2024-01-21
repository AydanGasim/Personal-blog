@extends('layouts.master')

@section('content')

    <!-- Start Author Area  -->
    <div class="axil-author-area axil-author-banner bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-author">
                        <h1 style="color: #825e47" class="title text-center"><a href="#0">Contact Me</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="contact text-center border p-4">
                        <h2 style="color: #825e47" class="title"><i class="fa-solid fa-phone"> Phone</i></h2>
                        <p class="mb-0">{{$settings->contact_phone}}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="contact text-center border p-4">
                        <h2 style="color: #825e47" class="title"><i class="fa-solid fa-envelope"> E-mail</i></h2>
                        <p class="mb-0" >{{$settings->contact_email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Author Area  -->
        @include('widgets.errors')
    <form  method="POST" action="{{ route('addMessage') }}" class=" contact-form--1 row col-md-6 mx-auto"  autocomplete="off">
        <!-- Your form content -->
    @csrf
        <h4 class="title mb--10">Send Us a Message</h4>
        <p class="b3 mb--30">Your email address will not be published. All the fields are required.</p>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <label for="contact-name">Your Name</label>
                <input name="full_name" id="contact-name" type="text">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <label for="contact-email">Your Email</label>
                <input name="email" id="contact-email" type="email">
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="form-group">
                <label for="complaint-reason">Reason of Complaint</label>
                <select name="reason" id="complaint-reason">
                    <option value="1">Complaints</option>
                    <option value="2">Getting the details about a service </option>
                    <option value="3">Suggestions</option>
                    <option value="0">Other reasons</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="contact-message">Your Message</label>
                <textarea name="message" id="contact-message"></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-submit">
                <button  type="submit"  class="axil-button button-rounded btn-primary">Submit</button>
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcY41QpAAAAAG4IDeCeVQCcnsxnwQndJz2NrDq2"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LcY41QpAAAAAG4IDeCeVQCcnsxnwQndJz2NrDq2', {action: 'contact'}).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
@endsection
