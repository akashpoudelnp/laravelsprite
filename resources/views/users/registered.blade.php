@component('mail::message')
# Welcome to Laravel Sprite
## Hi {{$user->name}},
Sprite admins have created an account for you, you can access your account by clicking the button below.
<br>
You can login to your account using following credentials,
- Email: ``` {{$user->email}} ```
- Password: ``` {{$new_password}} ```
@component('mail::button', ['url' => 'http://localhost:8000/login'])
Login
@endcomponent

Thank you,<br>
HR Manager,
<br>
{{ config('app.name') }}
@endcomponent
