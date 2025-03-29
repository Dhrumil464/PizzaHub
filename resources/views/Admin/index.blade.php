@if (session('adminloggedin') && session('adminloggedin') == true)
    @php
        $adminloggedin = true;
        $userId = session('adminuserId');
    @endphp
@else
    @php
        $adminloggedin = false;
        $userId = 0;
    @endphp
    <script>
        window.location.href = "{{ route('admin.login') }}";
    </script>
@endif

@if ($adminloggedin)
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
            integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <title>Admin Page</title>
        <link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">

        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('assetsForSideBar/css/styles.css') }}">

    </head>

    <body id="body-pd" style="background: #80808045;">
        @extends('admin.layouts.nav')
        @section('content')
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif --}}

            @if (request('loginsuccess') && request('loginsuccess') == 'true')
                <div class="alert alert-success alert-dismissible fade show alertmsg" role="alert" style="width:100%;margin-top: 65px;">
                    <strong>Success!</strong> You are logged in
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>
            @endif

            @php
                $page = request('page') ? request('page') : 'home';
            @endphp
            {{ view('admin.' . $page) }}


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
            </script>
            <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
            <script src="{{ asset('assetsForSideBar/js/main.js') }}"></script>
        @endsection
    </body>

    </html>
@endif
