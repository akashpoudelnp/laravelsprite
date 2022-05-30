<h1>Reset Password for {{ $user->email }}</h1>
<br>
<p>
    You are receiving this email because we received a password reset request for your account.
</p>
<br>
<b>
    The reset link will expire after
    @if (config('app.password_reset_expiration') > 60)
        @php
            // float to int
            $hours = intval(config('app.password_reset_expiration') / 60);
            $minutes = config('app.password_reset_expiration') % 60;
        @endphp

        {{-- conver minutes to hour --}}
        {{ $hours }} hours {{ $minutes ? "$minutes minutes" : '' }}
    @else
        {{ config('app.password_reset_expiration') }} minutes
    @endif
</b>
<br>
<p>
    <a href="{{ route('users.reset-password-view', urlencode($token)) }}">
        Reset Now
    </a>
</p>
