<header class="header" id="header">
    <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>

    <div class="header__img">
        <img src="{{ asset('assetsForSideBar/img/profil.jpg') }}" alt="">
    </div>
</header>

<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="{{ route('admin.index', ['loginsuccess' => 'false']) }}" class="nav__logo">
                <i class='bx bx-layer nav__logo-icon'></i>
                <span class="nav__logo-name">Pizza Hub</span>
            </a>

            <div class="nav__list">
                <a href="{{ route('admin.dashboard', ['page' => 'home']) }}" class="nav__link nav-home">
                    <i class='bx bx-grid-alt nav__icon'></i>
                    <span class="nav__name">Home</span>
                </a>
                <a href="{{ route('admin.dashboard', ['page' => 'orderManage']) }}" class="nav-orderManage nav__link ">
                    <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                    <span class="nav__name">Orders</span>
                </a>
                <a href="{{ route('admin.dashboard', ['page' => 'categoryManage']) }}" class="nav__link nav-categoryManage">
                    <i class='bx bx-folder nav__icon'></i>
                    <span class="nav__name">Category List</span>
                </a>
                <a href="{{ route('admin.dashboard', ['page' => 'menuManage']) }}" class="nav__link nav-menuManage">
                    <i class='bx bx-message-square-detail nav__icon'></i>
                    <span class="nav__name">Menu</span>
                </a>
                <a href="index.php?page=contactManage" class="nav__link nav-contactManage">
                    <i class="fas fa-hands-helping"></i>
                    <span class="nav__name">contact Info</span>
                </a>
                <a href="index.php?page=userManage" class="nav__link nav-userManage">
                    <i class='bx bx-user nav__icon'></i>
                    <span class="nav__name">Users</span>
                </a>
                <a href="index.php?page=siteManage" class="nav__link nav-siteManage">
                    <i class="fas fa-cogs"></i>
                    <span class="nav__name">Site Settings</span>
                </a>
            </div>
        </div>
        <a href="partials/_logout.php" class="nav__link">
            <i class='bx bx-log-out nav__icon'></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>

@yield('content')
