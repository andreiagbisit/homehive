<x-base-account-form>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Login</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="account_form_container_child_login_forgot">
        <x-base-account-form-login-forgot-outer-row>
            <x-slot name="content_login_forgot">
                <div id="login-form-img" class="col-lg-6 d-none d-lg-block" style="background-image: url('img/login.png');"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold;">This is HomeHive, a unified subdivision management system.</h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf

                            <div class="form-group">
                                <p id="input-label">Email Address <span style="color: red;">*</span></p>
                                <input type="email" name="email" class="form-control form-control-user" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <p id="input-label">Password <span style="color: red;">*</span></p>
                                <input type="password" name="password" class="form-control form-control-user" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember_me">
                                    <label class="custom-control-label" for="remember_me" style="color: #000; font-weight: bold;">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-user btn-block" style="color: #000; font-weight: bold;">
                                Log In
                            </button>
                            <hr>
                        </form>
                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}" style="font-weight: bold;">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="text-center">
                            @if (Route::has('register'))
                                <a class="small" style="font-weight: bold;" href="{{ route('register') }}">Create New Account</a>
                            @endif
                        </div>
                    </div>
                </div>
            </x-slot>

        </x-base-account-form-login-forgot-outer-row>
    </x-slot>

    <x-slot name="account_form_container_child_create"></x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base-account-form>
