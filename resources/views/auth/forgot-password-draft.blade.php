<x-base-account-form>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Forgot Password</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="account_form_container_child_login_forgot">
        <x-base-account-form-login-forgot-outer-row>
            <x-slot name="content_login_forgot">
                <div class="col-lg-9">
                    <div class="p-5">
                        <div class="text-center">
                            <img class="img-fluid mt-1 mb-4" src="{{ url('img/logo-1.png') }}"><hr><br>

                            <h1 class="h4 mb-2" style="color: #000; font-weight: bold;">Forgot Password?</h1>

                            <img style="height: 300px;" class="img-fluid mt-4 mb-4" src="{{ url('img/lock.png') }}">

                            <p class="mb-4" style="color: #000;">
                                Kindly provide your email address in the provided field below and wait for a password reset link to be sent shortly.
                            </p>
                        </div>

                        <!-- Check for status message -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('password.request.submit') }}" class="user">
                        @csrf <!-- This is important for security! -->

                        <div class="form-group">
                            <p id="input-label">Email Address <span style="color: red;">*</span></p>
                            <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" required>
                        </div><br>

                        <button type="submit"
                            style="color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" 
                            class="btn btn-warning btn-block font-weight-bold">
                            RESET PASSWORD
                        </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" style="font-weight: bold;" href="{{ route('register') }}">Create New Account</a>
                        </div>
                        <div class="text-center">
                            <a class="small"  style="font-weight: bold;" href="{{ url('login') }}">Log In to an Existing Account</a>
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