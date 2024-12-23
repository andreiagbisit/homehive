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
                <div class="col-lg-9" style="display: flex; justify-content: center;">
                    <div class="p-5">
                        <div class="text-center">
                            <img class="img-fluid mt-1 mb-4" src="{{ url('img/logo-1.png') }}">

                            <img class="img-fluid mt-4 mb-4" src="{{ url('img/house.png') }}">

                            <!-- Flash message for successful registration -->
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <!-- End of Flash message -->

                        </div>

                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf

                            <div class="form-group">
                                <p id="input-label">Email Address <span style="color: red;">*</span></p>
                                <input type="email" name="email" 
                                       class="form-control form-control-user" 
                                       value="{{ old('email') }}" required autofocus>

                                <!-- Display error for invalid email -->
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <p id="input-label">Password <span style="color: red;">*</span></p>
                                <input type="password" name="password" class="form-control form-control-user" required>

                                <!-- Display error for invalid password -->
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div><br>

                            <button type="submit"
                                    style="color: #000; border-radius: 35rem; 
                                           padding: .75rem .1rem; line-height: 1.5;" 
                                    class="btn btn-warning btn-block font-weight-bold">
                                LOG IN
                            </button>
                            <hr>
                        </form>

                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}" 
                                   style="font-weight: bold;">Forgot Password?</a>
                            @endif
                        </div>

                        <div class="text-center">
                            @if (Route::has('register'))
                                <a class="small" style="font-weight: bold;" href="{{ route('register') }}">
                                    Create New Account
                                </a>
                            @endif
                        </div><br>

                        <div class="text-center">
                            <p id="page-desc" style="font-weight: 300;">Developed by <span style="font-weight: 700;">BindBytes</span></p>
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
