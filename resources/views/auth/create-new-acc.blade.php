<x-base-account-form>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Create New Account</title>
            </x-slot>
        </x-head>
    </x-slot>

    <x-slot name="account_form_container_child_create">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-11">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-9">
                                                <img class="img-fluid mt-1 mb-4" src="{{ url('img/logo-1.png') }}">
                                            </div>
                                        </div><hr><br>

                                        <h1 class="h4" style="color: #000; font-weight: bold;">Create New Account</h1>

                                        <img id="appt-and-res-img" style="height: 250px;" class="img-fluid mt-4 mb-4" src="{{ url('img/add-user.png') }}">
                                        
                                        <p class="mb-4" style="color: #000;">
                                            Please fill in the necessary details provided with the following fields below to register a new account. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                                        </p>
                                    </div><hr>

                                    <h5 class="mt-4" id="page-desc">I. Account Name</h5><br>
                                    <form method="POST" action="{{ route('register.store') }}" class="user">
                                        @csrf  
                                        <div class="form-group mb-4">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Username <span style="color: red;">*</span></p>
                                            <input type="text" class="form-control form-control-user" name="uname" value="{{ old('uname') }}" required>
                                            @error('uname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div><hr>

                                        <h5 class="mt-4" id="page-desc">II. Personal Information</h5><br>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">First Name <span style="color: red;">*</span></p>
                                                <input type="text" class="form-control form-control-user" name="fname" value="{{ old('fname') }}" required>
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Middle Name</p>
                                                <input type="text" class="form-control form-control-user" name="mname" value="{{ old('mname') }}">
                                                @error('mname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Last Name <span style="color: red;">*</span></p>
                                                <input type="text" class="form-control form-control-user" name="lname" value="{{ old('lname') }}" required>
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Birthdate <span style="color: red;">*</span></p>
                                                <input type="date" class="form-control form-control-user" name="bdate" value="{{ old('bdate') }}" required>
                                                @error('bdate')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><hr>

                                        <h5 class="mt-4" id="page-desc">III. Contact Information</h5><br>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Email <span style="color: red;">*</span></p>
                                                <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Contact No. <span style="color: red;">*</span></p>
                                                <input type="text" class="form-control form-control-user" name="contact_no" value="{{ old('contact_no') }}" pattern="\d*" required>
                                                @error('contact_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><hr>

                                        <h5 class="mt-4" id="page-desc">IV. Address</h5><br>
                                        <div class="form-group">
                                            <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Street <span style="color: red;">*</span></p>
                                            <input type="text" class="form-control form-control-user" name="street" value="{{ old('street') }}" required>
                                            @error('street')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">House Block No. <span style="color: red;">*</span></p>
                                                <input type="text" class="form-control form-control-user" name="house_blk_no" value="{{ old('house_blk_no') }}" required>
                                                @error('house_blk_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">House Lot No. <span style="color: red;">*</span></p>
                                                <input type="text" class="form-control form-control-user" name="house_lot_no" value="{{ old('house_lot_no') }}" required>
                                                @error('house_lot_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><hr>

                                        <h5 class="mt-4" id="page-desc">V. Account Password</h5><br>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Password <span style="color: red;">*</span></p>
                                                <input type="password" class="form-control form-control-user" name="password" required>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Repeat Password <span style="color: red;">*</span></p>
                                                <input type="password" class="form-control form-control-user" name="password_confirmation" required>
                                            </div>
                                        </div><br>

                                        <button type="submit"
                                                style="color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" 
                                                class="btn btn-warning btn-block font-weight-bold">
                                            CREATE ACCOUNT
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" style="font-weight: bold;" href="{{ url('login') }}">Log In to an Existing Account</a>
                                    </div><br>

                                    <div class="text-center">
                                        <p id="page-desc" style="font-weight: 300;">Developed by <span style="font-weight: 700;">BindBytes</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="account_form_container_child_login_forgot"></x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base-account-form>
