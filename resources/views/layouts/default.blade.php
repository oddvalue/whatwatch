<!DOCTYPE html>
<html>
<head>
    <title>WHAT WATCH?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href='http://fonts.googleapis.com/css?family=Flamenco|Unica+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}" />
</head>
<body>
    @yield('main')
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
