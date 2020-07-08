@component('mail::message')
# Contact form message

# Username : {{ $name }}

# Email : {{ $email }}

# Subject : {{ $subject }}

# Message : {{ $message }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
