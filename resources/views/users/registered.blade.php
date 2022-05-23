@component('mail::message')
# Welcome to Laravel Sprite
## Hi {{$user->name}},
Sprite admins have created an account for you, you can access your account by clicking the button below.
@component('mail::button', ['url' => 'http://localhost:8000/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
