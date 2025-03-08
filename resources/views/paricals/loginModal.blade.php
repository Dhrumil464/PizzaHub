<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4b5366;">
                <h5 class="modal-title text-light" id="loginModal">Login Here</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.handleUserLogin') }}" method="post">
                    @csrf
                    <div class="text-left my-2">
                        <b><label for="username">Email</label></b>
                        <input class="form-control" id="loginusername" name="email" placeholder="Enter Your Email"
                            type="email" required>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="password">Password</label></b>
                        <input class="form-control" id="loginpassword" name="password" placeholder="Enter Your Password"
                            type="password" required data-toggle="password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <p class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#signupModal">Sign up now</a>.</p>
            </div>
        </div>
    </div>
</div>

@yield('loginModal')
