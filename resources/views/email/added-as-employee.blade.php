@component('mail::message')

    Hi {{ $data['name'] }},

    Welcome to EmployeCRUD - Your account has now been activated.

    A summary of your account details are below.

@component('mail::button', ['url' => '#'])
Click Here To Login
@endcomponent

    Employee Name : {{ $data['name']}},
    Email : {{ $data['email'] }},
    Password : {{ $data['password'] }}

    Please don't forget to change your password after first login..

    Thanks,
    The team at {{ config('app.name') }}
@endcomponent