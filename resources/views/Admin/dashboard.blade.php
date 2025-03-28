<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .dashboard-box {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: 0.3s;
        position: relative;
        overflow: hidden;
    }

    .dashboard-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .dashboard-box h4 {
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .dashboard-box p {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 0;
    }

    .dashboard-box::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 50%;
        height: 4px;
        background: #007bff;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .row .col-md-3 {
        margin-bottom: 20px;
    }
</style>
<link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">

<body id="body-pd" style="background: #80808045;">
    @extends('admin.layouts.nav')
    @section('content')
        <h1 style="margin-top:98px">Welcome back, <b>{{ session('adminusername') }}</b></h1>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="dashboard-box">
                    <h4>Orders</h4>
                    <p class="counter" data-target="1200">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-box">
                    <h4>Categories</h4>
                    <p class="counter" data-target="10">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-box">
                    <h4>Menu Items</h4>
                    <p class="counter" data-target="50">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-box">
                    <h4>Users</h4>
                    <p class="counter" data-target="500">0</p>
                </div>
            </div>
        </div>
    @endsection
    <script>
        $(document).ready(function() {
            $('.counter').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-target');
                $({ countNum: $this.text() }).animate({ countNum: countTo }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        });
    </script>
</body>
