
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    @include('user.css')
</head>
<body>
@include('user.loder')

@include('user.header')

@include('user.cartdes')

@include('user.mycart-des')



@include('user.footer')

@include('user.js')
</body>
</html>
