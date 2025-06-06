<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap menu, navbar, mega menu examples" />
    <meta name="description" content="Bootstrap navbar examples for any type of project, Bootstrap 4" />

    <title>Profile</title>
    <link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
        body {
            background-color: #221b1b;
        }

        .row {
            margin-right: 150px;
            margin-top: 73px;
        }

        .footer {
            position: fixed;
            bottom: 0;
        }

        #notfound {
            position: relative;
            height: 89vh;
            background-color: aliceblue;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 410px;
            width: 100%;
            text-align: center;
        }

        .notfound .notfound-404 {
            height: 280px;
            position: relative;
            z-index: -1;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 230px;
            margin: 0px;
            font-weight: 900;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background: url('img/bg.jpg') no-repeat;
            /* -webkit-background-clip: text; */
            -webkit-text-fill-color: transparent;
            background-size: cover;
            background-position: center;
        }


        .notfound h2 {
            font-family: 'Montserrat', sans-serif;
            color: #000;
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 0;
        }


        .notfound a {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            background: #0046d5;
            display: inline-block;
            padding: 15px 30px;
            border-radius: 40px;
            color: #fff;
            font-weight: 700;
            box-shadow: 0px 4px 15px -5px #0046d5;
        }


        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 142px;
            }

            .notfound .notfound-404 h1 {
                font-size: 112px;
            }
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        button.btn.upload {
            border: 2px solid gray;
            background-color: #bababa;
            border-radius: 8px;
            font-size: 10px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        /* new */

        .jumbotron {
            width: 28%;
            margin: 0 auto;
            border-radius: 30px;
        }

        .content-panel {
            margin: 0 auto;
        }

        .pimg {
            margin-left: 15px;
        }

        @media screen and (max-width: 992px) {
            .acontainer {
                flex-direction: column;
            }

            .jumbotron {
                width: 78%;
            }

            .content-panel {
                width: 80%;
                margin-top: 30px;
                margin-bottom: 80px;
            }
        }
    </style>

</head>

<body>
    @extends('layouts.nav')

    @section('content')
        @php
            $userid = session('userId');
        @endphp
        @if ($userid)
            @php
                $user = DB::table('users_admins')->where('userid', $userid)->first();
            @endphp
            <div class="container">
                <div class="d-flex justify-content-center my-5 acontainer">
                    <div class="jumbotron p-3 d-flex justify-content-center">
                        <div class="user-info">
                            <center><img class="rounded-circle mb-3 bg-dark d-flex pimg" src="img/profilePic.jpg"
                                    onError="this.src = 'img/profilePic.jpg'" style="max-width:80%; margin-left: -3px;">
                            </center>
                            <ul class="meta list list-unstyled" style="text-align:center;margin-top: 30px;">
                                <li class="username my-2"><a
                                        href="{{ route('user.viewProfile') }}">{{ '@' . $user->username }}</a></li>
                                <li class="name">{{ $user->firstname }} {{ $user->lastname }}
                                    <label class="label label-info"></label>
                                </li>
                                <li class="email">{{ $user->email }}</li>
                                <li class="my-2"><a href="{{ route('user.logout') }}"><button
                                            class="btn btn-md btn-secondary">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-panel d-flex justify-content-center">
                        <div class="border p-3"
                            style="border: 2px solid rgba(0, 0, 0, 0.1);background-color: aliceblue; border-radius: 30px;">
                            <h2 class="title text-center">Your Profile<span class="pro-label label label-warning"></span>
                            </h2>

                            <form action="{{ route('user.manageProfile', ['userid' => $userid]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <b><label for="username">Username:</label></b>
                                    @if ($user->usertype == 0)
                                        <input class="form-control" id="username" name="username" type="text"
                                            placeholder="Enter Your username" value="{{ $user->username }}">
                                    @else
                                        <input class="form-control" id="username" name="username" type="text"
                                            placeholder="Enter Your username" value="{{ $user->username }}" readonly>
                                    @endif
                                    @error('username')
                                        <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <b><label for="firstName">First Name:</label></b>
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                            placeholder="First Name" value="{{ $user->firstname }}">
                                        @error('firstName')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <b><label for="lastName">Last Name:</label></b>
                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                            placeholder="Last name" value="{{ $user->lastname }}">
                                        @error('lastName')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b><label for="email">Email:</label></b>
                                    @if ($user->usertype == 0)
                                        <input type="email" class="form-control" id="email" name="email" placeholder=""
                                            value="{{ $user->email }}" readonly>
                                    @else
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Your Email" value="{{ $user->email }}">
                                    @endif  
                                    @error('email')
                                        <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <b><label for="phone">Phone No:</label></b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon">+91</span>
                                            </div>
                                            <input type="tel" class="form-control" id="phone" name="phoneNo"
                                                placeholder="Enter Your Phone Number" value="{{ $user->phoneno }}">
                                        </div>
                                        @error('phoneNo')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <b><label for="password">Password:</label></b>
                                        <input class="form-control" id="password" name="password"
                                            placeholder="Enter Password" type="password" data-toggle="password"
                                            value="{{ $user->password }}">
                                        @error('password')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" name="updateProfileDetail" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                    </div>
                    <h2>404 - Page not found</h2>
                    <a href="index.php">Go To Homepage</a>
                </div>
            </div>
        @endif
    @endsection

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        $('#image').change(function() {
            var i = $(this).prev('button').clone();
            var file = ($('#image')[0].files[0].name).substring(0, 5) + "..";
            $(this).prev('button').text(file);
        });
    </script>
</body>

</html>
