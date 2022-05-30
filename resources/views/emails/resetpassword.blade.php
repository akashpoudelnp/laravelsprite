<h1>Reset Password for {{ $user->email }}</h1>
<br>
<p>
    You are receiving this email because we received a password reset request for your account.
</p>
<p>
    <a href="{{ route('users.reset-password-view', urlencode($token)) }}">
        Reset Now
    </a>
</p>
