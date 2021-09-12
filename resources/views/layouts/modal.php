<div class="modal fade p-0" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <ul class="nav nav-pills w-100" id="pills-tab" role="tablist">
                    <li class="nav-item col-6 p-0" role="presentation">
                        <a class="nav-link active btn-logreg" id="pills-login-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item col-6 p-0" role="presentation">
                        <a class="nav-link btn-logreg" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="pills-tabContent">
                    <form class="form-signin tab-pane fade show active pt-0 form-login-and-register" id="pills-home" role="tabpanel" aria-labelledby="pills-login-tab">
                        <label class="login-text">Username:</label>
                        <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        <label class="login-text">Password:</label>
                        <input type="password" id="inputPassword" class="form-control" required="">
                        <div class="d-flex mt-2">
                            <div class="custom-control custom-checkbox col-6">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label form-control-label" for="customControlInline">Remember me</label>
                            </div>
                            <a href="#" id="forgot_pswd" class="col-6 pr-0 form-text-forgotpass">Forgot password</a>
                        </div>
                        <div class=" d-flex justify-content-center">
                            <button class="btn btn-success btn-block custom-btn-login" type="submit">LOGIN</button>
                        </div>
                        <div class="d-flex justify-content-center p-0 title-social-login">Login with</div>
                        <div class="d-flex flex-column social-login">
                            <button class="btn google-btn social-btn" type="button"><span class="d-flex justify-content-center align-item-center"><i class="fab fa-google-plus-g mr-2"></i>  Google</span> </button>
                            <button class="btn facebook-btn social-btn" type="button"><span class="d-flex justify-content-center align-item-center"><i class="fab fa-facebook-f mr-2"></i>  Facebook</span> </button>
                        </div>
                    </form>                  
                    <form class="form-signup tab-pane fade pt-0 form-login-and-register" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                        <label class="login-text">Username:</label>
                        <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        <label class="login-text">Email:</label>
                        <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        <label class="login-text">Password:</label>
                        <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        <label class="login-text">Repeat Password:</label>
                        <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success btn-block custom-btn-login" type="submit">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
