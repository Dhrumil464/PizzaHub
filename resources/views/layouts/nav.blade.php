@if (session('userloggedin') && session('userloggedin') == true)
    @php
        $userloggedin = true;
        $usertype = session('usertype');
    @endphp
@else
    @php
        $userloggedin = false;
        $usertype = 0;
    @endphp
@endif

@php
    use Carbon\Carbon;
@endphp

@include('paricals.loginModal')
@include('paricals.signupModal')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <a class="navbar-brand" href="{{ route('user.index') }}">Pizza Hub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.index') }}">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Top Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @php
                        $categories = App\Models\Categories::orderBy('iscombo', 'asc')->get();
                    @endphp
                    @foreach ($categories as $cat)
                        <a class="dropdown-item"
                            href="{{ route('user.viewPizzaList', ['catid' => $cat->catid]) }}">{{ $cat->catname }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.viewOrder') }}">Your Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.about') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.contact') }}">Contact Us</a>
            </li>
        </ul>

        <form method="POST" action="{{ route('user.search') }}" class="form-inline my-2 my-lg-0 mx-3">
            @csrf
            <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search"
                aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <a href="{{ route('user.showCart') }}">
            <button type="button" class="btn btn-secondary mx-2" title="MyCart">
                <svg xmlns="img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                @php
                    $cartCounts = App\Models\PizzaCart::where('userid', session('userId'))->count();
                @endphp
                <i class="bi bi-cart">Cart({{ $cartCounts }})</i>
            </button>
        </a>

        @if ($userloggedin == true)
            <ul class="navbar-nav mr-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown">Welcome {{ session('username') }}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="text-center image-size-small position-relative">
                <a href="{{ route('user.viewProfile') }}"><img src="/img/profilepic.jpg" class="rounded-circle"
                        onError="this.src = \'/img/profilepic.jpg\'" style="width:40px; height:40px"></a>
            </div>
        @else
            <button type="button" class="btn btn-success mx-2" data-toggle="modal"
                data-target="#loginModal">Login</button>
            <button type="button" class="btn btn-success mx-2" data-toggle="modal"
                data-target="#signupModal">SignUp</button>
        @endif
    </div>
</nav>

@if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show alertmsg" role="alert">
        <strong>Warning!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show alertmsg" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
    </div>
@endif

@yield('content')

<div class="footer py-3 container-fluid bg-dark text-light">
    <p class="text-center py-2 mb-0">Copyright © {{ Date('Y') }} Designed by <a
            href="https://github.com/Dhrumil464/pizzahub" target="_blank" rel="noopener noreferrer"
            style="color:#1bbca3;">@pizzahub</a></p>
</div>

<script>
    // Automatically close alerts after 3 seconds (3000ms)
    setTimeout(function() {
        $(".alertmsg").fadeOut("slow");
    }, 2000);
</script>
