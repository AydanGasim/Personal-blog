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
@if(session('login_err'))

    <script>
        swal("Error!", "Wrong Email or Password!", "error");
    </script>
@endif

@if(session('error'))

    <script>
        swal("Error!", "Unsuccessful!", "error");
    </script>
@endif

@if(session('success'))

    <script>
        swal("Success!", "Successful!", "success");
    </script>
@endif


