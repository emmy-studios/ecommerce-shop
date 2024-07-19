<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cancel an Order</title>

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

        <h2>Cancel an Order!</h2>

        <p>
            The user <span>{{ $data['first_name'] }} {{ $data['last_name'] }}</span> has made a cancelation request.
        </p>

        <h3>Order Request</h3>
        <p>
            <span>Order Code: </span> {{ $data['order_code'] }}
        </p>

        <p>
            <span>Email: </span> {{ $data['email'] }}
        </p>

        <p>
            Please, change the status or delete the order if the request is valid.
        </p>

    </body>

</html>