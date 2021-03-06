<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/limupa/css/login.css') }}">
    </head>
    <body>
        <div class="login-reg-panel">
            <div class="login-info-box">
                <h2>Have an account?</h2>
                <label id="label-register" for="log-reg-show">Login</label>
                <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
            </div>
                                
            <div class="register-info-box">
                <h2>Don't have an account?</h2>                
                <label id="label-login" for="log-login-show">Register</label>
                <input type="radio" name="active-log-panel" id="log-login-show">
            </div>
                                
            <div class="white-panel">
                <div class="login-show">
                    <h2>LOGIN</h2>
                    <form id="frmLogin" class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <input id="acc_user" name="acc_user" value="{{ old('acc_user') }}" required autofocus type="text" placeholder="Username">
                        @if ($errors->has('acc_user'))
                            <span class="help-block {{ $errors->has('acc_user') ? ' has-error' : '' }}">
                                <strong>{{ $errors->first('acc_user') }}</strong>
                            </span>
                        @endif
                        <input id="acc_password" name="acc_password" required type="password" placeholder="Password">
                        @if ($errors->has('acc_user'))
                            <span class="help-block {{ $errors->has('acc_password') ? ' has-error' : '' }}">
                                <strong>{{ $errors->first('acc_password') }}</strong>
                            </span>
                        @endif
                        <input type="submit" value="Login"> 
                        <div style="float: left; display: grid;">
                            <label>
                                <input type="checkbox" name="acc_remember" {{ old('acc_remember') ? 'checked' : '' }}> Remember me!
                            </label>              
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                        
                    </form>
                </div>
                <div class="register-show">
                    <h2>REGISTER</h2>
                    <form id="frmRegister" class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <input id="acc_user_register" type="text" class="form-control @error('acc_user_register') is-invalid @enderror" name="acc_user_register" value="{{ old('acc_user_register') }}" required autocomplete="acc_user_register" autofocus placeholder="Username">
                        @error('acc_user_register')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                        <input id="acc_password_register" type="password" class="form-control @error('acc_password_register') is-invalid @enderror" name="acc_password_register" required autocomplete="new-password" placeholder="Password">
                        @error('acc_password_register')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="acc_password_register-confirm" type="password" class="form-control" name="acc_password_register_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <input type="submit" value="Register"> 
                    </form>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>

        $(document).ready(function(){
            $('.login-info-box').fadeOut();
            $('.login-show').addClass('show-log-panel');
            @if ($errors->has('acc_user_register') || $errors->has('acc_password_register') )
                $('.register-info-box').fadeOut(); 
                $('.login-info-box').fadeIn();
                
                $('.white-panel').addClass('right-log');
                $('.register-show').addClass('show-log-panel');
                $('.login-show').removeClass('show-log-panel');          
            @endif
            
        });


        $('.login-reg-panel input[type="radio"]').on('change', function() {
            if($('#log-login-show').is(':checked')) {
                $('.register-info-box').fadeOut(); 
                $('.login-info-box').fadeIn();
                
                $('.white-panel').addClass('right-log');
                $('.register-show').addClass('show-log-panel');
                $('.login-show').removeClass('show-log-panel');
                
            }
            else if($('#log-reg-show').is(':checked')) {
                $('.register-info-box').fadeIn();
                $('.login-info-box').fadeOut();
                
                $('.white-panel').removeClass('right-log');
                
                $('.login-show').addClass('show-log-panel');
                $('.register-show').removeClass('show-log-panel');
            }
        });
    </script>
</html>

