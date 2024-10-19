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
                <div id="forgot-pw-form-img" class="col-lg-6 d-none d-lg-block" style="background-image: url('/img/forgot.png')"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2" style="font-weight: bold;">Forgot Password?</h1>
                            <p class="mb-4" style="color: #000;">
                                Kindly provide your email address in the provided field below and wait for a password reset link to be sent shortly.
                            </p>
                        </div>
                        <form method="POST" action="{{ route('password.request.submit') }}" class="user">
                        @csrf <!-- This is important for security! -->

                        <div class="form-group">
                            <p id="input-label">Email Address <span style="color: red;">*</span></p>
                            <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" required>
                        </div>

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