<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('Contact Us') }} {{ __('Email') }}</title>

        <style>

            h1 {
                color: blueviolet;
                font-size: large;
                text-align: center
            }

        </style>

    </head>

    <body>
        
        <h1>{{ __('Contact Us Message') }}</h1>
        <br>
        <br>
        
        <p><strong>{{ __('Name') }}: </strong>{{ $data['name'] }}</p>
        <p><strong>{{ __('Email') }}: </strong>{{ $data['email'] }}</p>
        <p><strong>{{ __('Message') }}: </strong>{{ $data['message'] }}</p>

    </body>

</html>