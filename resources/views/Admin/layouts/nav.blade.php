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
        {{-- <link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon"> --}}

        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('assetsForSideBar/css/styles.css') }}">

    </head>

    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="{{ asset('/assetsForSideBar/img/profil.jpg') }}" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Pizza Hub</span>
                </a>

                <div class="nav__list">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav__link nav-home {{ request('page') == 'home' ? 'active' : '' }}">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__name">Home</span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav__link nav-orderManage {{ request('page') == 'orderManage' ? 'active' : '' }}">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">Orders</span>
                    </a>
                    <a href="{{ route('admin.manageCategory') }}"
                        class="nav__link nav-categoryManage {{ request('page') == 'categoryManage' ? 'active' : '' }}">
                        <i class='bx bx-folder nav__icon'></i>
                        <span class="nav__name">Pizza Category List</span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav__link nav-menuManage {{ request('page') == 'menuManage' ? 'active' : '' }}">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Pizza Item List</span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav__link nav-contactManage {{ request('page') == 'contactManage' ? 'active' : '' }}">
                        <i class="fas fa-hands-helping"></i>
                        <span class="nav__name">Contact Info</span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav__link nav-userManage {{ request('page') == 'userManage' ? 'active' : '' }}">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Users</span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav__link nav-siteManage {{ request('page') == 'siteManage' ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i>
                        <span class="nav__name">Site Settings</span>
                    </a>
                </div>
            </div>
            <a href="{{ route('admin.logout') }}" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div>
    @endif

    @yield('content')

    <body>
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
    </body>

    </html>
@endif
