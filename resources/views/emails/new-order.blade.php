<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('New Order Made') }}</title>

        <style>

            h1 {
                color: blueviolet;
                font-size: large;
                text-align: center
            }

            h2, h3 {
                font-size: xx-large;
                text-align: center
            }
            span {
                font-size: large;
            }

        </style>

    </head>

    <body>
        
        <h1>{{ $data['website_name'] }}</h1>

        <h2>{{ __('New Order Made') }}!</h2>

        <p>
            {{ __('The user') }} <span>{{ $data['first_name'] }} {{ $data['last_name'] }}</span> {{ __('has made a new order') }}.
        </p>

        <h3>{{ __('Order Resume') }}</h3>
        <p>
            <span>{{ __('Username') }}: </span> {{ $data['username'] }}
        </p>
        <p>
            <span>{{ __('First Name') }}: </span> {{ $data['first_name'] }}
        </p>
        <p>
            <span>{{ __('Last Name') }}: </span> {{ $data['last_name'] }}
        </p>
        <p>
            <span>{{ __('Customer') }} {{ __('Email') }}: </span> {{ $data['email'] }}
        </p>
        <p>
            <span>{{ __('Customer') }} {{ __('Phone') }}: </span> {{ $data['user_phone'] }}
        </p>
        <p>
            <span>{{ __('Order Code') }}: </span> {{ $data['order_code'] }}
        </p>
        <p>
            <span>{{ __('Order') }} {{ __('Subtotal') }}: </span> ${{ $data['order_subtotal'] }}
        </p>
        <p>
            <span>{{ __('Order') }} {{ __('Total') }}: </span> ${{ $data['total'] }}
        </p>

        <p>
            {{ __('Please, check the admin dashboard or the database record to verifyed and continue the process.') }}
        </p>

    </body>

</html>