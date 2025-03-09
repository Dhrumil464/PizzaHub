<link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">
<body id="body-pd" style="background: #80808045;">
    @extends('admin.layouts.nav')
    @section('content')
        <h1 style="margin-top:98px">Welcome back <b>{{ session('adminusername') }}</b></h1>
    @endsection
</body>
