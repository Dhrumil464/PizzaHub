<!-- Sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #4b5366">
                <h5 class="modal-title" id="signupModal">SignUp Here</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.handleUserSignup') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <b><label for="username">Username</label></b>
                        <input class="form-control" id="username" name="username"
                            placeholder="Choose a unique Username" type="text" minlength="3" maxlength="11" required>
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstName">First Name:</label></b>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="First Name" required>
                            @if ($errors->has('firstname'))
                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                            @endif

                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastName">Last name:</label></b>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Last name" required>
                            @if ($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="email">Email:</label></b>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Your Email" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+91</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phoneNo"
                                placeholder="Enter Your Phone Number" pattern="[0-9]{10}" maxlength="10" required>
                            @if ($errors->has('phoneNo'))
                                <span class="text-danger">{{ $errors->first('phoneNo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="password">Password:</label></b>
                        <input class="form-control" id="password" name="password" placeholder="Enter Password"
                            type="password" data-toggle="password" minlength="4" maxlength="21" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="text-left my-2">
                        <b><label for="password1">Renter Password:</label></b>
                        <input class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password"
                            type="password" data-toggle="password" minlength="4" maxlength="21" required>
                        @if ($errors->has('cpassword'))
                            <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#loginModal">Login here</a>.</p>
            </div>
        </div>
    </div>
</div>

@yield('signupModal')
