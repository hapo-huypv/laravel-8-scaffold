<div class="modal fade p-0" id="modalLoginRegister" tabindex="-1" role="dialog" aria-labelledby="modalLoginRegisterLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <ul class="nav nav-pills w-100" id="pillsTab" role="tablist">
                    <li class="nav-item col-6 p-0" role="presentation">
                        <a class="nav-link active btn-logreg" id="pillsLoginTab" data-toggle="pill" href="#pillsLogin" role="tab" aria-controls="pillsLogin" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item col-6 p-0" role="presentation">
                        <a class="nav-link btn-logreg" id="pillsRegisterTab" data-toggle="pill" href="#pillsRegister" role="tab" aria-controls="pillsRegister" aria-selected="false">Register</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="pillsTabContent">
                    <form action="{{route('login')}}" method="POST" class="form-signin tab-pane fade show active pt-0 form-login-and-register" id="pillsLogin" role="tabpanel" aria-labelledby="pillsLoginTab">
                        @csrf <!-- {{ csrf_field() }} -->
                        <label for="username" class="login-text">{{ ('Username') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="login-text">Password:</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="d-flex mt-2">
                            <div class="custom-control custom-checkbox col-6">
                                <input  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label form-control-label" for="customControlInline">Remember me</label>
                            </div>
                            <a href="#" id="forgot_pswd" class="col-6 pr-0 form-text-forgotpass">Forgot password</a>
                        </div>
                        <div class=" d-flex justify-content-center">
                            <button class="btn btn-success btn-block custom-btn-login" type="submit">LOGIN</button>
                        </div>
                        <div class="d-flex justify-content-center p-0 title-social-login">Login with</div>
                        <div class="d-flex flex-column social-login">
                            <a href="{{ route('google') }}" class="btn google-btn social-btn d-flex justify-content-center align-items-center" type="button"><span class="d-flex justify-content-center align-items-center"><i class="fab fa-google-plus-g mr-2"></i>  Google</span> </a>
                            <a class="btn facebook-btn social-btn d-flex justify-content-center align-items-center" type="button"><span class="d-flex justify-content-center align-items-center"><i class="fab fa-facebook-f mr-2"></i>  Facebook</span> </a>
                        </div>
                    </form>                  
                    <form action="{{route('register')}}" method="POST" class="form-signup tab-pane fade pt-0 form-login-and-register" id="pillsRegister" role="tabpanel" aria-labelledby="pillsRegisterTab">
                    @csrf <!-- {{ csrf_field() }} -->
                        <label for="name" class="login-text">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="email" class="login-text">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="password" class="login-text">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid c @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="passwordConfirm" class="login-text">{{ __('Confirm Password') }}</label>
                        <input id="passwordConfirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class=" d-flex justify-content-center">
                            <button class="btn btn-success btn-block custom-btn-login" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
