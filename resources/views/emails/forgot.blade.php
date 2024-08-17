@component('mail::message')

<p>Hello {{ $user->name }}</p>


<p>{{ __('we understand it happens.') }}</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

<p>{{ __('In case you have any issues recovering your password, please contact us.') }} </p>

{{ __('Thanks') }} <br />
{{ config('app.name') }}

@endcomponent