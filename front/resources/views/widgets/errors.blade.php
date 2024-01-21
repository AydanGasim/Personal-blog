<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('error_contact'))

    <script>
        swal("Error!", "Failed!", "error");
    </script>
@endif

@if(session('success_contact'))

    <script>
        swal("Success!", "Your message has successfully been accepted! Check your email for further processing!", "success");
    </script>
@endif
@if(session('errorRecaptcha'))

    <script>
        swal("...!", "There is an error. Please, try again!", "error");
    </script>
@endif
