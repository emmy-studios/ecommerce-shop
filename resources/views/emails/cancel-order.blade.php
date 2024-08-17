<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('Cancel an Order') }}</title>

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

        <h2>{{ __('Cancel an Order') }}!</h2>

        <p>
            {{ __('The user') }} <span>{{ $data['first_name'] }} {{ $data['last_name'] }}</span> {{ __('has made a cancelation request.') }}
        </p>

        <h3>{{ __('Order Request') }}</h3>
        <p>
            <span>{{ __('Order Code') }}: </span> {{ $data['order_code'] }}
        </p>

        <p>
            <span>{{ __('Email') }}: </span> {{ $data['email'] }}
        </p>

        <p>
            {{ __('Please, change the status order or delete the order if the request is valid.') }}
        </p>

    </body>

</html>