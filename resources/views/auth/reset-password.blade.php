<h1>Reset Password</h1>

<form action="{{ route('password.reset.submit') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        <label>Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>New Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Reset Password</button>
</form>
